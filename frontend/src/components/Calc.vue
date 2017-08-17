<template>
    <form class='form col-md-4 col-md-offset-4'>
        <CityInput placeholder='Откуда' v-model='from'></CityInput>
        <div class='form-group calc-icon'>
            <span class='glyphicon glyphicon-sort'></span>
        </div>
        <CityInput placeholder='Куда' v-model='to'></CityInput>
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
            cost: 0
        };
    },
    methods: {
        countCost() {
            let weight = parseFloat(this.weight.match(/^\d*.?\d*$/));
            let volume = parseFloat(this.volume.match(/^\d*.?\d*$/));
            if (weight && volume) {
                let tax;
                if (weight < 1.5 && volume < 10) {
                    tax = 15;
                } else if (weight < 3 && volume < 20) {
                    tax = 22;
                } else if (weight < 5 && volume < 40) {
                    tax = 30;
                }

                if (tax) {
                    ymaps.route([this.from, this.to]).then(route => {
                        let length = route.getLength();
                        this.cost = Math.round(length*tax*0.001);
                    });
                }
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
