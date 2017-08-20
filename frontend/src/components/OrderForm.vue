<template>
    <div class='col-md-6 col-md-offset-3'>
        <form class='form-horizontal'>
            <div class='form-group'>
                <label class='col-md-4 control-label'>Название фирмы отправителя</label>
                <div class='col-md-8'>
                    <input type='text' class='form-control'>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label'>Город погрузки</label>
                <div class='col-md-8'>
                    <CityInput></CityInput>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label'>Город назначения</label>
                <div class='col-md-8'>
                    <CityInput></CityInput>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label'>ФИО заказчика</label>
                <div class='col-md-8'>
                    <input type='text' class='form-control'>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label'>Телефон заказчика</label>
                <div class='col-md-8'>
                    <input type='tel' class='form-control'>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label'>Email заказчика</label>
                <div class='col-md-8'>
                    <input type='email' class='form-control'>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label'>Тип груза</label>
                <div class='col-md-8'>
                    <input type='text' class='form-control'>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label'>Вес груза</label>
                <div class='col-md-8'>
                    <div class='input-group'>
                        <input type='number' class='form-control'>
                        <div class='input-group-addon'>кг</div>
                    </div>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label'>Объем груза</label>
                <div class='col-md-8'>
                    <div class='input-group'>
                        <input type='number' class='form-control'>
                        <div class='input-group-addon'>м<sup>3</sup></div>
                    </div>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label'>Дата погрузки</label>
                <div class='col-md-8'>
                    <input type='date' class='form-control'>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-md-8 col-md-offset-4'>
                    <button type='submit' class='btn btn-primary'>
                        Сделать заказ
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import CityInput from './CityInput.vue';

export default {
    components: {
        CityInput
    }
};
</script>

<style scoped>
form {
    text-align: left;
}
</style>
