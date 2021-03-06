<template>
    <Header></Header>
</template>

<script>
import Header from "./components/Header";
export default {
    name: 'app',
    components: {Header},
    mounted() {
        console.log("Example component mounted");
    }
};
</script>
