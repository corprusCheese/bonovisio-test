<template>
    <div class="container">
        <form @submit="checkForm" method="post">
        <div class="row justify-content-center ">
            <div class="col-md-8 custom-row">
                <p class="name">
                    <label for="name" class="col-5">Имя</label>
                    <input id="name" v-model="name" class="col-7 form-control" type="text" name="name" placeholder="Твоё имя"/>
                </p>

                <p class="email">
                    <label for="email" class="col-5">E-Mail</label>
                    <input id="email" v-model="email" type="text" class="col-7 form-control" name="email" placeholder="name@example.com"/>
                </p>
                <p class="text">
                    <label for="text" class="col-5">Текст сообщения</label>
                    <textarea id="text" v-model="text" class="col-12 form-control" style="height: 150px" name="text" placeholder="Текст сообщения"></textarea>
                </p>
                <p class="agreement">
                    <input id="agreement" v-model="agreement" name="agreement" type="checkbox">
                    <label for="agreement" class="col-10">Согласие на обработку персональных данных</label>
                </p>
                <p class="send">
                    <input id="createButton" class="btn col-5" style="background: white; border: 1px solid grey" type="submit" value="Создать письмо"/>
                </p>
            </div>
        </div>
        </form>
        <div class="row justify-content-center mt-5">
        <p v-if="errors.length">
            <b>Пожалуйста исправьте указанные ошибки:</b>
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
        </p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Create',
    data: function () {
        return {
            name: "",
            email: "",
            text: "",
            agreement: false,
            errors: [],
        }

    },
    methods: {
        createLetter: function (e) {
            e.preventDefault();
            axios.post("/api/letter", {
                "name": this.name,
                "email":this.email,
                "text": this.text
            }).then((result)=> {
                if (result.status === 200) {
                    alert("Письмо отправлено!")
                } else {
                    alert("Ошибка отправления")
                }
            })
        },
        checkForm: function (e) {
            this.errors = [];

            if (!this.name) {
                this.errors.push('Требуется указать имя.');
            }
            if (!this.email) {
                this.errors.push('Требуется указать email.');
            } else if (!this.validEmail(this.email)) {
                this.errors.push('Укажите корректный адрес email.');
            }

            if (!this.agreement) {
                this.errors.push('Нужно согласиться на обработку персональных данных для отправки письма.');
            }

            if (!this.errors.length) {
                this.createLetter(e);
                return true;
            }

            e.preventDefault();
        },
        validEmail: function (email) {
            var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
    }
}
</script>

<style>
</style>
