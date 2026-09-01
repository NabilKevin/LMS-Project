const roleRouteMap: Record<string, string> = {
  "/admin": "admin",
  "/teacher": "teacher",
  "/student": "student",
};

export default defineNuxtRouteMiddleware((to) => {
  const user = useCookie<{ role: string }>("user_data");
  if (!user.value) return;

  const matchedPrefix = Object.keys(roleRouteMap).find((prefix) =>
    to.path.startsWith(prefix),
  );

  if (matchedPrefix && user.value.role !== roleRouteMap[matchedPrefix]) {
    return navigateTo("/unauthorized");
  }
});
