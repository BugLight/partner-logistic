<template>
    <li :class='{ active: active }'>
        <a :href='href'>
            <slot></slot>
        </a>
    </li>
</template>

<script>
export default {
    props: ['active', 'href']
};
</script>
