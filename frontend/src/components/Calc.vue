<template>
    <form class='form-inline'>
        <CityInput placeholder='Откуда' v-model='from'></CityInput>
        <div class='form-group calc-icon'>
            <span class='glyphicon glyphicon-sort'></span>
        </div>
        <CityInput placeholder='Куда' v-model='to'></CityInput>
    </form>
</template>

<script>
import CityInput from './CityInput.vue';

export default {
    data() {
        return {
            from: '',
            to: ''
        };
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
