<template>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8 custom-row">
                <p class="name">
                    <label for="name" class="col-5">Имя</label>
                    <input class="col-7 form-control" type="text" name="name" value="Имя автора"/>
                </p>

                <p class="email">
                    <label for="email" class="col-5">E-Mail</label>
                    <input type="text" class="col-7 form-control" name="email" value="name@example.com"/>
                </p>
                <p class="message">
                    <label for="message" class="col-5">Текст сообщения</label>
                    <textarea class="col-12 form-control" style="height: 150px" name="message"></textarea>
                </p>
                <p class="agreement">
                    <input name="agreement" type="checkbox">
                    <label for="agreement" class="col-10">Согласие на обработку персональных данных</label>
                </p>
                <p class="send">
                    <input class="btn col-5" style="background: white; border: 1px solid grey" type="submit" value="Создать письмо"/>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Create',
}
</script>

<style>
</style>
