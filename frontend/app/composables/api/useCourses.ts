import type { Course, Courses } from "~/types/courses";
import type { Pagination } from "~/types/pagination";
import { useApi } from "./useApi";

export const useCourses = () => {
  const getCourses = async (
    page: number,
    status: string,
    search?: string,
  ): Promise<{
    data: Courses[];
    pagination: Pagination;
  }> => {
    return await useApi<{
      data: Courses[];
      pagination: Pagination;
    }>(
      `/api/student/courses?page=${page}&status=${status}${search && search !== "" ? `&search=${search}` : ""}`,
      {
        method: "GET",
      },
    );
  };

  const getCourse = async (
    slug: string,
  ): Promise<{
    data: Course;
  }> => {
    return await useApi<{
      data: Course;
    }>(`/api/student/courses/${slug}`, {
      method: "GET",
    });
  };

  return { getCourses, getCourse };
};
