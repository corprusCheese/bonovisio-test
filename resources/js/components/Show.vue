<template>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8 custom-row">
                <p class="name">
                    <label for="name" class="col-5">Имя</label>
                    <input readonly class="col-7 form-show" type="text" name="name" value=""/>
                </p>

                <p class="email">
                    <label for="email" class="col-5">E-Mail</label>
                    <input readonly type="text" class="col-7 form-show" name="email" value=""/>
                </p>
                <p class="message">
                    <label for="message" class="col-5">Текст сообщения</label>
                    <textarea readonly class="col-12 form-show" style="min-height: 150px; height: fit-content" name="message"></textarea>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Show',
}
</script>

<style>
</style>
