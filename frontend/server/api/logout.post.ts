// server/api/logout.post.ts
export default defineEventHandler(async (event) => {
  const token = getCookie(event, "auth_token");
  const config = useRuntimeConfig(event);

  if (token) {
    try {
      await $fetch(`${config.apiBaseUrl}/logout`, {
        method: "POST",
        headers: { Authorization: `Bearer ${token}` },
      });
    } catch (e) {
      console.error("Error occurred while logging out:", e);
    }
  }

  deleteCookie(event, "auth_token");
  deleteCookie(event, "user_data");

  return { success: true };
});
