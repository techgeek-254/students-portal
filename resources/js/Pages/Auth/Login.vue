<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import 'primeicons/primeicons.css';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head>
            <title>Login</title>
        </Head>

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <div class="flex">
                    <div class="pi pi-inbox flex-none w-9 content-center text-slate-400	 " style="font-size: 20px;">
                    </div>
                    <div class="flex-1">
                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                            autofocus autocomplete="username" />
                    </div>
                </div>
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">

                <InputLabel for="password" value="Password" />

                <div class="flex">
                    <div class="pi pi-key flex-none w-9 content-center text-slate-400 focus-" style="font-size: 20px;">
                    </div>
                    <div class="flex-1">
                        <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                            required autocomplete="current-password" />
                    </div>
                </div>
                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <!--
            <div class="mt-4 block">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>
-->
            <div class="mt-4 flex items-center justify-end">
                <Link v-if="canResetPassword" :href="route('password.request')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                Forgot password ?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>

                <a href="http://students-portal.test/register">
                    <div
                        class="ms-4 inline-flex items-center rounded-md border border-solid border-purple-700 bg-white 
        px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-400 hover:text-purple-800 transition duration-150 ease-in-out hover:bg-purple-50 
        focus:bg-purple-100 focus:outline-none focus:ring-2 focus:ring-purple-800 focus:ring-offset-2 active:bg-purple-100 ">
                        Register
                    </div>
                </a>

            </div>
        </form>
    </GuestLayout>
</template>
