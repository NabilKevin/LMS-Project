export interface LoginResponse {
  user: {
    id: number;
    email: string;
    role: string;
    full_name: string;
    photo_url: string | null;
    profile?: {
      nis?: string;
      nip?: string;
      academic_title?: string;
      class_id?: number;
    } | null;
  };
}
