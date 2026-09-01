export default defineNuxtConfig({
  modules: ["@nuxt/eslint", "@nuxt/ui", "@nuxt/icon"],

  devtools: {
    enabled: true,
  },

  css: ["~/assets/css/main.css"],

  routeRules: {
    "/": { prerender: true },
  },

  compatibilityDate: "2026-06-30",

  eslint: {
    config: {
      stylistic: {
        commaDangle: "never",
        braceStyle: "1tbs",
      },
    },
  },
  app: {
    head: {
      title: "Learning Management System",
      link: [{ rel: "icon", type: "image/png", href: "/favicon.png" }],
    },
  },
  runtimeConfig: {
    apiBaseUrl: process.env.NUXT_PUBLIC_API_BASE_URL,
    public: {
      appName: process.env.NUXT_PUBLIC_APP_NAME,
    },
  },
});
