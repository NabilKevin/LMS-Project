<template>
  <div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-slate-100 to-blue-100 p-4">
    <main class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg">
      <div class="mb-8 text-center">
        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center">
          <img src="/favicon.png" alt="">
        </div>
        <h1 class="text-2xl font-bold text-slate-900">LMS Portal</h1>
        <p class="mt-2 text-sm text-slate-600">Sign in to your account</p>
      </div>

      <form class="space-y-5">
        <div class="rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-700" role="alert">
          Invalid email or password
        </div>

        <div>
          <label for="email" class="mb-2 block text-sm font-medium text-slate-700">
            Email Address
          </label>
          <input
            id="email"
            name="email"
            type="email"
            autocomplete="email"
            required
            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
            placeholder="you@example.com"
          />
        </div>

        <div>
          <label for="password" class="mb-2 block text-sm font-medium text-slate-700">
            Password
          </label>
          <input
            id="password"
            name="password"
            type="password"
            autocomplete="current-password"
            required
            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
            placeholder="Enter your password"
          />
        </div>

        <button
          type="submit"
          class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
          Sign In
        </button>
      </form>
    </main>
  </div>
</template>