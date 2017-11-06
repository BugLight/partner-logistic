<template>
    <header role='banner'>
        <nav class='navbar navbar-default navbar-fixed-top' role='navigation'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar-collapse' aria-expanded='false'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <NavLink class='navbar-brand' href='html'>Партнер Логистик</NavLink>
                </div>
                <p class='navbar-text'>
                    <span class='glyphicon glyphicon-earphone'></span>
                    +7(909)980-3070
                </p>
                <div class='collapse navbar-collapse' id='navbar-collapse'>
                    <ul class='nav navbar-nav navbar-right'>
                        <li v-for='link in links'>
                            <NavLink :href='link.url'>
                                {{link.text}}
                            </NavLink>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
import NavLink from './NavLink.vue';

export default {
    data() {
        return {
            links: [
                {
                    name: 'calculator',
                    text: 'Калькулятор',
                    url: '#calculator'
                },
                {
                    name: 'contacts',
                    text: 'Контакты',
                    url: '#contacts'
                },
            ]
        };
    },
    components: {
        NavLink
    }
};
</script>

<style scoped>
.navbar-brand {
    text-transform: uppercase;
}
</style>
