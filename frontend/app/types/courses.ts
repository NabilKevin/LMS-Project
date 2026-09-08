import type { Topic } from "./topics";

export interface Courses {
  id: number;
  name: string;
  slug: string;
  academic_year: string;
  teacher_name: string;
  progress: number;
}

export interface Course {
  id: number;
  course_name: string;
  teacher_name: string;
  class_name: string;
  progress: number;
  total_topics: number;
  total_sub_topics: number;
  topics: Topic[];
}
