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
                    <input v-model='volume' type='number' class='form-control' placeholder='Объем груза'>
                    <div class='input-group-addon'>м<sup>3</sup></div>
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
            cost: 0,
            error: ''
        };
    },
    methods: {
        countCost() {
            this.cost = 0;
            this.error = '';
            let weight = parseInt(this.weight.match(/^\d*$/));
            let volume = parseInt(this.volume.match(/^\d*$/));
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
                    if (weightResidue < t.weight && volumeResidue < t.volume) {
                        tax += t.price;
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
</style>
