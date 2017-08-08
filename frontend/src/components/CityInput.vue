<template>
    <div class='form-group autocomplete-wrapper'>
        <input
        @focus='toggleFocus(true)'
        @blur='toggleFocus(false)'
        @keyup='autoComplete'
        class='form-control'
        type='text'
        :placeholder='placeholder'
        v-model='query'>
        <ul v-if='focused && vars.length' class='autocomplete'>
            <li v-for='v in vars'>
                <a @mousedown='updateValue(v.title)'>{{v.title}}</a>
            </li>
        </ul>
    </div>
</template>

<script>
import vk from '../utils/vk.js';

const vk_api = vk('5.67');

export default {
    props: ['value', 'placeholder'],
    data() {
        return {
            focused: false,
            vars: [],
            query: ''
        };
    },
    methods: {
        autoComplete() {
            vk_api.call('database.getCities', {
                country_id: 1,
                q: this.query,
                count: 10
            }).then(results => {
                this.vars = results.response.items;
            });
        },
        updateValue(val) {
            this.query = val;
            this.$emit('input', val);
        },
        toggleFocus(state) {
            this.focused = state;
        }
    },
}
</script>

<style scoped>
a {
    text-decoration: none;
    display: inline-block;
    width: 100%;
}

li {
    cursor: pointer;
    padding: 3px;
}

li:hover {
    background: #ddd;
}

.autocomplete {
    position: absolute;
    padding: 0;
    margin: 0;
    background-color: #fff;
    list-style: none;
    box-shadow: 0 0 3px 2px #aaa;
    z-index: 10101;
}

.autocomplete-wrapper {
    vertical-align: top !important;
}
</style>
