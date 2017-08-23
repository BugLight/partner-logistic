<template>
    <header>
        <nav class='navbar navbar-default navbar-fixed-top' role='navigation'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar-collapse' aria-expanded='false'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <a @click='makeActive()' class='navbar-brand' href='#'>Партнер Логистик</a>
                </div>
                <div class='collapse navbar-collapse' id='navbar-collapse'>
                    <ul class='nav navbar-nav navbar-right'>
                        <NavLink
                        v-for='link in links'
                        @click.native='makeActive(link.name)'
                        :href='link.url'
                        :active='link.name == active'
                        :key='link.name'>
                            {{link.text}}
                        </NavLink>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
import NavLink from './NavLink.vue';

export default {
    props: ['active'],
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
                {
                    name: 'order',
                    text: 'Сделать заказ',
                    url: '#order'
                },
            ]
        };
    },
    methods: {
        makeActive(link_name) {
            this.$emit('update:active', link_name || '');
        }
    },
    components: {
        NavLink
    }
};
</script>
