export default defineEventHandler(async (event) => {
  const token = getCookie(event, "auth_token");
  const config = useRuntimeConfig(event);

  // Baca query parameter, misalnya /api/auth/logout?local=true
  const query = getQuery(event);
  const isLocalOnly = query.local === "true";

  // Hanya tembak backend JIKA token ada DAN bukan perintah localOnly
  if (token && !isLocalOnly) {
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
