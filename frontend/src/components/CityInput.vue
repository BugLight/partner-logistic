<template>
    <div class='autocomplete-wrapper'>
        <a v-if='value' @click='clear' class='clear-field'>
            <i class='glyphicon glyphicon-remove'></i>
        </a>
        <input
        @focus='toggleFocus(true)'
        @blur='toggleFocus(false)'
        @keyup='edit'
        class='form-control'
        type='text'
        :placeholder='placeholder'
        v-model='value'>
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
            selected: false,
            vars: []
        };
    },
    methods: {
        autoComplete() {
            vk_api.call('database.getCities', {
                country_id: 1,
                q: this.value,
                count: 10
            }).then(results => {
                this.vars = results.response.items;
            });
        },
        clear() {
            this.updateValue('');
        },
        edit() {
            this.selected = false;
            this.autoComplete();
        },
        updateValue(val) {
            this.$emit('input', val);
            this.selected = true;
        },
        toggleFocus(state) {
            if (state)
                this.autoComplete();
            else if (!this.selected) {
                this.updateValue(this.vars[0].title);
            }
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
    width: 250px;
    padding: 0;
    margin: 0;
    background-color: #fff;
    list-style: none;
    box-shadow: 0 0 3px 2px #aaa;
    z-index: 10101;
}

.autocomplete-wrapper {
    vertical-align: top !important;
    text-align: left;
    position: relative;
}

.clear-field {
    position: absolute;
    color: #333;
    cursor: pointer;
    left: 95%;
    top: 7px;
    width: 0;
    height: 0;
}
</style>
