export default defineNuxtRouteMiddleware((to) => {
  const user = useCookie<{ role: string }>("user_data");
  const publicPages = ["/login"];

  if (!user.value?.role && !publicPages.includes(to.path)) {
    return navigateTo("/login");
  }

  if (user.value?.role && to.path === "/login") {
    return navigateTo(`/${user.value?.role}/dashboard`);
  }

});