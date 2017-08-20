<template>
  <div id='app'>
      <AppHeader :active.sync='activeSection'></AppHeader>
      <main>
          <section class='container-fluid top-section'>
              <div class='col-md-4 top-section__content'>
                  <p>
                      ООО Партнер Логистик занимается автоперевозками грузов по России.
                      Мы располагаем собственным транспортом различной грузоподъемности.
                  </p>
              </div>
          </section>
          <section class='container-fluid'>
              <h2>Выполняем</h2>
              <div class='row'>
                  <div class='col-md-4 col-sm-12'>
                      <img class='icon' src='./assets/continuous.svg'>
                      <p>
                          Автотранспортное обслуживание предприятий на постоянной основе
                      </p>
                  </div>
                  <div class='col-md-4 col-sm-12'>
                      <img class='icon' src='./assets/route.svg'>
                      <p>
                          Междугородние грузоперевозки
                      </p>
                  </div>
                  <div class='col-md-4 col-sm-12'>
                      <img class='icon' src='./assets/made.svg'>
                      <p>
                          Доставку сборных грузов
                      </p>
                  </div>
              </div>
          </section>
          <section class='container-fluid'>
              <h2>Преимущества работы с нами</h2>
              <div class='col-md-8 col-md-offset-2'>
                  <div class='row'>
                      <div class='col-md-6'>
                          <img class='icon' src='./assets/auto.svg'>
                          <p>Собственный автопарк</p>
                      </div>
                      <div class='col-md-6'>
                          <img class='icon' src='./assets/driver.svg'>
                          <p>Постоянные водители в штате</p>
                      </div>
                  </div>
                  <div class='row'>
                      <div class='col-md-6'>
                          <img class='icon' src='./assets/order.svg'>
                          <p>Простое оформление заказа</p>
                      </div>
                      <div class='col-md-6'>
                          <img class='icon' src='./assets/credit-card.svg'>
                          <p>Различные варианты оплаты</p>
                      </div>
                  </div>
                  <div class='row'>
                      <div class='col-md-6 col-md-offset-3'>
                          <img class='icon' src='./assets/truck.svg'>
                          <p>
                              Транспорт грузоподъемностью от 1 до 10 тонн и
                              с объемом кузова от 5 до 50 кубов
                          </p>
                      </div>
                  </div>
              </div>
          </section>
          <section class='container-fluid' id='calculator'>
              <h2>Рассчитать стоимость</h2>
              <Calc></Calc>
          </section>
          <section class='container-fluid' id='order'>
              <h2>Оформить заказ</h2>
              <OrderForm></OrderForm>
          </section>
          <section class='container-fluid' id='contacts'>
              <h2>Контакты</h2>
          </section>
      </main>
      <footer>

      </footer>
  </div>
</template>

<script>
import AppHeader from './components/AppHeader.vue';
import Calc from './components/Calc.vue';
import OrderForm from './components/OrderForm.vue';

export default {
  name: 'app',
  data() {
      return {
          activeSection: window.location.hash.slice(1)
      };
  },
  components: {
      AppHeader,
      Calc,
      OrderForm
  }
};
</script>

<style>
@import "http://fonts.fontstorage.com/import/lato.css";

html, body, main, #app {
    height: 100%;
}

body {
    background-image: url(assets/bg.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;

    font-family: 'Lato', sans-serif;

    padding-top: 70px;
}

h1, h2, h3 {
    margin-bottom: 20px;
}

section {
    background-color: #fafafa;
    text-align: center;
    padding-top: 15px;
    padding-bottom: 15px;
}

.top-section {
    display: flex;
    background-color: inherit;
    justify-content: flex-end;
    align-items: center;
    text-align: left;
    min-height: 50%;
}

.top-section__content {
    font-weight: bold;
    font-size: 1.3em;
    color: #fff;
    text-shadow: #000 1px 1px 3px;
}

.icon {
    width: 50px;
}
</style>
