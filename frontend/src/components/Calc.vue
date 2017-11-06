<template>
    <div class='col-md-4 col-md-offset-4'>
        <div class='alert alert-danger' v-if='error'>
            {{error}}
        </div>
        <form class='form'>
            <div class='form-group'>
                <CityInput placeholder='Откуда' v-model='from'></CityInput>
            </div>
            <div class='form-group calc-icon'>
                <span class='glyphicon glyphicon-sort'></span>
            </div>
            <div class='form-group'>
                <CityInput placeholder='Куда' v-model='to'></CityInput>
            </div>
            <div class='form-group'>
                <div class='input-group'>
                    <input v-model='weight' type='number' class='form-control' placeholder='Вес груза'>
                    <div class='input-group-addon'>кг</div>
                </div>
            </div>
            <div class='form-group'>
                <div class='input-group'>
                    <input v-model='volume' type='number' class='form-control' placeholder='Объем груза' :disabled='!!width||!!height||!!length'>
                    <div class='input-group-addon'>м<sup>3</sup></div>
                </div>
            </div>
            <h4>Габариты груза:</h4>
            <div class='form-group row'>
                <div class='col-md-4'>
                    <div class='input-group'>
                        <input v-model='width' type='number' class='form-control' placeholder='Ш' :disabled='!!volume'>
                        <div class='input-group-addon'>м</div>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='input-group'>
                        <input v-model='height' type='number' class='form-control' placeholder='В' :disabled='!!volume'>
                        <div class='input-group-addon'>м</div>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='input-group'>
                        <input v-model='length' type='number' class='form-control' placeholder='Д' :disabled='!!volume'>
                        <div class='input-group-addon'>м</div>
                    </div>
                </div>
            </div>
            <button @click.prevent='countCost' class='btn btn-submit'>
                Рассчитать
            </button>
            <div class='form-group'>
                <label v-if='cost'>
                    Стоимость доставки: {{cost}} руб.
                </label>
            </div>
        </form>
        <p>
            * Калькулятор вычисляет примерную стоимость доставки. Точная сумма определяется
            при оформлении заказа.
        </p>
    </div>
</template>

<script>
import CityInput from './CityInput.vue';

export default {
    data() {
        return {
            from: '',
            to: '',
            weight: '',
            volume: '',
            width: '',
            height: '',
            length: '',
            cost: 0,
            error: ''
        };
    },
    methods: {
        percentageAvailable(from, to) {
            const available = ['Брянск', 'Москва'];

            return available.indexOf(to) > -1 && available.indexOf(from) > -1 && from != to;
        },
        countCost() {
            this.cost = 0;
            this.error = '';
            let weight = parseInt(this.weight.match(/^\d*$/));
            let volume = parseInt(this.volume.match(/^\d*$/));
            let height = parseInt(this.height.match(/^\d*$/));
            let width = parseInt(this.width.match(/^\d*$/));
            let length = parseInt(this.length.match(/^\d*$/));

            if (!volume && height && width && length) {
                volume = height * width * length;
            }
            if (weight && volume) {
                let tax, fulledVehiclesAmount, weightResidue, volumeResidue;
                const taxes = [
                    {
                        weight: 1500,
                        volume: 10,
                        price: 15
                    },
                    {
                        weight: 3000,
                        volume: 20,
                        price: 22
                    },
                    {
                        weight: 5000,
                        volume: 40,
                        price: 30
                    }
                ]
                const {
                    weight: maxWeight,
                    volume: maxVolume,
                    price: maxPrice
                } = taxes[2];

                if (weight/volume > maxWeight/maxVolume) {
                    fulledVehiclesAmount = Math.floor(weight/maxWeight);
                    weightResidue = weight%maxWeight;
                    volumeResidue = weightResidue/weight*volume;
                } else {
                    fulledVehiclesAmount = Math.floor(volume/maxVolume);
                    volumeResidue = volume%maxVolume;
                    weightResidue = volumeResidue/volume*weight;
                }
                tax = fulledVehiclesAmount*maxPrice;
                for (let t of taxes) {
                    if (weightResidue <= t.weight && volumeResidue <= t.volume) {
                        if (this.percentageAvailable(this.from, this.to)) {
                            tax += t.price*(weight/t.weight>volume/t.volume?weight/t.weight:volume/t.volume);
                        } else {
                            tax += t.price;
                        }
                        break;
                    }
                }
                ymaps.route([this.from, this.to]).then(route => {
                    let length = route.getLength();
                    this.cost = Math.round(length*2*tax*0.001);
                }).catch(error => {
                    this.error = 'Ошибка построения маршрута! Проверьте правильность введеных пунктов.';
                });
            }
            else {
                this.error = 'Введены некорректный вес или объем груза!';
            }
        }
    },
    components: {
        CityInput
    }
};
</script>

<style scoped>
.calc-icon {
    text-align: center;
}
.glyphicon {
    vertical-align: middle;
}

h4 {
    text-align: left;
}
</style>
