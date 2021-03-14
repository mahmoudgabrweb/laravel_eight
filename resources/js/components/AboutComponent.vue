<template>
    <div>
        <input type="text" v-model="name" />
        About Component
        <p>{{ name }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: ""
        }
    },
}
</script>