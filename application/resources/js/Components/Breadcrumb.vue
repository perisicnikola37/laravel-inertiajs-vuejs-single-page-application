<template>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <inertia-link class="hover:text-blue-500 duration-200" :href="`/${href}`">{{ title }}</inertia-link>
        /
        <inertia-link :href="`/${href}/${property.id}`" class="text-blue-500">
            {{ property.name }}
        </inertia-link>
    </h2>
</template>

<script>

export default {
    props: {
        property: Object,
        title: String,
        href: String
    }
}
</script>
