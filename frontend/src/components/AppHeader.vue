<template>
    <header>
        <nav class='navbar navbar-default' role='navigation'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a @click='makeActive()' class='navbar-brand' href='#'>Партнер Логистик</a>
                </div>
                <ul class='nav navbar-nav navbar-right'>
                    <NavLink
                    v-for="link in links"
                    @click.native='makeActive(link.name)'
                    :href='link.url'
                    :active='link.name == active'
                    :key='link.name'>
                        {{link.text}}
                    </NavLink>
                </ul>
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
