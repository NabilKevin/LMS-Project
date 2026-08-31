<script setup lang="ts">
const { login } = useAuth();

const error = ref("");
const isLoading = ref(false);
const formData = ref({
  email: "",
  password: "",
});

const handleLogin = async () => {
  error.value = "";
  isLoading.value = true;

  try {
    const data = formData.value;
    const res = await login(data);

    const authCookie = useCookie("auth_token", {
      maxAge: 60 * 60 * 24 * 7,
      sameSite: "lax",
      secure: !import.meta.dev,
    });

    authCookie.value = res.data.token;

    navigateTo(`/dashboard/${res.data.user.role}/`);
  } catch (e: any) {
    error.value = e.response["_data"].message;
  } finally {
    isLoading.value = false;
  }
};
</script>

<template>
  <div
    class="flex min-h-screen items-center justify-center bg-gradient-to-br from-slate-100 to-blue-100 p-4"
  >
    <UCard variant="soft" class="w-full max-w-md shadow-lg bg-white py-8 px-2">
      <div class="mb-8 text-center">
        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center">
          <img src="/favicon.png" alt="Logo" />
        </div>
        <h1 class="text-2xl font-bold text-slate-900">LMS Portal</h1>
        <p class="mt-2 text-sm text-slate-600">Sign in to your account</p>
      </div>

      <UForm class="space-y-5" @submit.prevent="handleLogin">
        <UAlert v-if="error" color="error" variant="subtle" :title="error" />

        <UFormField
          required
          label="Email"
          name="email"
          :ui="{ label: 'text-black' }"
        >
          <UInput
            class="w-full"
            color="neutral"
            variant="subtle"
            type="email"
            placeholder="you@example.com"
            autocomplete="email"
            size="xl"
            :ui="{ base: 'bg-white text-black focus-visible:ring-black' }"
            required
            v-model="formData.email"
          />
        </UFormField>

        <UFormField
          required
          label="Password"
          name="password"
          :ui="{ label: 'text-black' }"
        >
          <UInput
            class="w-full"
            color="neutral"
            variant="subtle"
            type="password"
            placeholder="Enter your password"
            autocomplete="current-password"
            size="xl"
            :ui="{ base: 'bg-white text-black focus-visible:ring-black' }"
            required
            v-model="formData.password"
          />
        </UFormField>

        <UButton
          type="submit"
          color="info"
          size="xl"
          block
          variant="subtle"
          :ui="{ base: 'cursor-pointer' }"
          :loading="isLoading"
        >
          Sign In
        </UButton>
      </UForm>
    </UCard>
  </div>
</template>
