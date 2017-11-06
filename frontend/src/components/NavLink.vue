<template>
    <a @click='scrollTo'>
        <slot></slot>
    </a>
</template>

<script>
import 'jquery';

export default {
    props: ['href'],
    methods: {
        scrollTo() {
            let paddingTop = parseInt($('body').css('padding-top').match(/\d+/));
            $('html, body').animate({
                scrollTop: $(this.href).offset().top - paddingTop
            }, 500, 'swing');
        }
    }
};
</script>

<style scoped>
a {
    cursor: pointer;
}
</style>
