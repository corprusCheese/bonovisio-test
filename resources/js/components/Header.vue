<template>
    <div>
        <div class="header">
            <nav class="custom-nav">
                <router-link to='/welcome'>О проекте</router-link>
                <br>
                <router-link to='/create'>Создать письмо</router-link>
                <br>
                <router-link to='/show'>Просмотреть все письма</router-link>
            </nav>
        </div>
        <router-view/>
    </div>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style>
</style>
