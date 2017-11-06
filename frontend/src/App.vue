<template>
  <div id='app'>
      <AppHeader :active.sync='activeSection'></AppHeader>
      <section class='container-fluid top-section'>
          <div class='col-md-5 top-section__content'>
              <p>
                  ООО Партнер Логистик занимается автоперевозками грузов по России.
                  Мы располагаем собственным транспортом различной грузоподъемности.
              </p>
              <form class='top-section__action'>
                  <NavLink href='#order' class='btn btn-primary'>
                      <span class='glyphicon glyphicon-triangle-bottom'></span>
                      Оформить заказ
                  </NavLink>
              </form>
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
      <section class='container-fluid inverse-section'>
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
      <section class='container-fluid bg-section'>
          <img class='bg-section__image' src='./assets/bg2.jpg'>
      </section>
      <section class='container-fluid' id='calculator'>
          <h2>Рассчитать стоимость</h2>
          <Calc></Calc>
      </section>
      <section class='container-fluid' id='order'>
          <h2>Оформление заказа</h2>
          <OrderForm></OrderForm>
      </section>
      <section class='container-fluid' id='contacts'>
          <h2>Контакты</h2>
          <div class='col-md-8 col-md-offset-2'>
              <div class='row'>
                  <div class='col-md-4'>
                      <span class='glyphicon glyphicon-envelope'></span>
                      <a>nebuzhu@mail.ru</a>
                  </div>
                  <div class='col-md-4'>
                      <span class='glyphicon glyphicon-earphone'></span>
                      +7(909)980-3070
                  </div>
                  <div class='col-md-4'>
                      <span class='glyphicon glyphicon-earphone'></span>
                      +7(909)990-3070
                  </div>
              </div>
          </div>
      </section>
      <footer>
          <div class='row'>
              <div class='col-md-3'>
                  <p>&copy; ООО "Партнер Логистик" 2017</p>
                  <p>125475 г. Москва, Дыбенко ул., д. 22, корп. 1.</p>
                  <p><a href='/static/docs/ИНН_ПЛ.jpg'>ИНН</a></p>
                  <p><a href='/static/docs/ОГРН_ПЛ.jpg'>ОГРН</a></p>
                  <p><a href='/static/docs/Сбер.jpg'>Счет Сбербанк</a></p>
                  <p><a href='/static/docs/ПФР.jpg'>Уведомление ПФР</a></p>
                  <p><a href='/static/docs/Коды.jpg'>Коды статистики</a></p>
              </div>
              <div class='col-md-3'>
                  <p>Расчетный счет 407 028 101 380 000 039 47</p>
                  <p>Кор. счет 301 018 104 000 000 002 25</p>
                  <p>БИК 044525225</p>
                  <p>ИНН / КПП 7743934807 / 774301001</p>
                  <p>ОГРН 1147746879191</p>
                  <p>ОКПО 00032537</p>
              </div>
              <div class='col-md-3'>
                  <p>Дата выдачи свидетельства: ЕГРЮЛ 05.08.2014</p>
                  <p>Регистрирующий орган, выдавший свидетельство ЕГРЮЛ: Межрайонная инспекция Федеральной налоговой службы №46 по г.Москве</p>
                  <p>Генеральный директор: Непрынцева Ирина Анатольевна</p>
              </div>
              <div class='col-md-3'>
                  <p>Разработано &copy;<a href='http://github.com/BugLight'>Buglight</a></p>
                  <div>
                      Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a>,
                      <a href="https://www.flaticon.com/authors/gregor-cresnar" title="Gregor Cresnar">Gregor Cresnar</a>,
                      <a href="https://www.flaticon.com/authors/epiccoders" title="EpicCoders">EpicCoders</a>,
                      <a href="https://www.flaticon.com/authors/rami-mcmin" title="Rami McMin">Rami McMin</a>
                      from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by
                      <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                  </div>
              </div>
          </div>
      </footer>
  </div>
</template>

<script>
import AppHeader from './components/AppHeader.vue';
import Calc from './components/Calc.vue';
import OrderForm from './components/OrderForm.vue';
import NavLink from './components/NavLink.vue';
import 'jquery';

export default {
    name: 'app',
    data() {
        return {
            activeSection: window.location.hash.slice(1)
        };
    },
    created() {
        // Setting up parallax effects
        $(window).scroll(() => {
            let scroll = Math.round($(window).scrollTop()*0.2 - 300);
            $('.bg-section__image').css('transform', `translateY(${scroll}px)`);
        });
    },
    components: {
        AppHeader,
        Calc,
        OrderForm,
        NavLink
    }
};
</script>

<style>
@import "http://fonts.fontstorage.com/import/lato.css";

html, body, #app {
    height: 100%;
}

body {
    background-image: url(assets/bg.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;

    font-family: 'Lato', sans-serif;

    padding-top: 50px;
}

h1, h2, h3 {
    margin-bottom: 20px;
}

footer {
    background-color: #333;
    padding: 40px;
    color: #fff;
    font-size: 0.9em;
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
    min-height: 300px;
}

.top-section__content {
    font-weight: bold;
    font-size: 1.3em;
    color: #fff;
    text-shadow: #000 1px 1px 3px;
}

.top-section__action {
    text-align: center;
    text-shadow: none;
}

.inverse-section {
    background-color: #333;
    color: #fff;
}

.bg-section {
    position: relative;
    overflow: hidden;
    height: 250px;
    padding: 0;
    background-color: rgba(0, 0, 0, 0);
}

@media (max-width: 900px) {
    .bg-section {
        height: 180px;
    }
}

.bg-section__image {
    transition: all 0.1s ease 0;
    z-index: -1;
}

.icon {
    width: 50px;
}
</style>
