import type { Courses } from "~/types/courses";
import { Pagination } from "~/types/pagination";

export default defineEventHandler(async (event) => {
  const token = getCookie(event, "auth_token");
  const config = useRuntimeConfig(event);
  const { page, search, status } = await getQuery(event);

  if (token) {
    try {
      const { data, pagination } = await $fetch<{
        success: boolean;
        message: string;
        data: [Courses];
        pagination: Pagination;
      }>(
        `${config.apiBaseUrl}/students/courses?page=${page}&status=${status}${search && search !== "" ? `&search=${search}` : ""}`,
        {
          method: "GET",
          headers: {
            Authorization: `Bearer ${token}`,
            Accept: "Application/json",
          },
        },
      );

      return { data, pagination };
    } catch (e: any) {
      throw createError({
        statusCode: e?.response?.status || 500,
        message: e?.data?.message || "Error while getting data!",
      });
    }
  }
});
