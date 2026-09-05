<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\ClassAssignment;
use App\Services\CourseService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class Get extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly CourseService $courseService,
    ) {}

    /**
     * Get Courses
     *
     * Mengambil daftar seluruh mata pelajaran (class assignments) milik
     * student yang sedang login beserta persentase kemajuan belajarnya
     * di masing-masing mata pelajaran.
     *
     * @group Student — Courses
     *
     * @authenticated
     *
     * @responseField data[].id           integer  ID unik dari penugasan kelas (class assignment).
     *                                             <br>Contoh: `1`
     *
     * @responseField data[].name         string   Nama mata pelajaran yang diajarkan.
     *                                             <br>Contoh: `"Matematika"`
     *
     * @responseField data[].slug         string   Slug URL-friendly dari mata pelajaran.
     *                                             Digunakan sebagai parameter pada endpoint detail kursus.
     *                                             <br>Contoh: `"matematika"`
     *
     * @responseField data[].academic_year string  Tahun ajaran dalam format `YYYY/YYYY`.
     *                                             <br>Contoh: `"2026/2027"`
     *
     * @responseField data[].teacher_name  string  Nama lengkap guru beserta gelar akademiknya.
     *                                             Mengembalikan string kosong (`""`) jika guru
     *                                             belum ditetapkan.
     *                                             <br>Contoh: `"Andi Wijaya, M.Pd"`
     *
     * @responseField data[].progress     number   Persentase kemajuan belajar student pada mata
     *                                             pelajaran ini (rentang: `0` hingga `100`).
     *                                             Dihitung dari jumlah materi yang diselesaikan
     *                                             dibagi total materi yang tersedia.
     *                                             <br>Tipe: `float` (dibulatkan 2 desimal)
     *                                             <br>Contoh: `66.67`
     *
     * @response 200 scenario="Berhasil — Student memiliki beberapa kursus" {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Matematika",
     *       "slug": "matematika",
     *       "academic_year": "2026/2027",
     *       "teacher_name": "Andi Wijaya, M.Pd",
     *       "progress": 66.67
     *     },
     *     {
     *       "id": 2,
     *       "name": "Fisika",
     *       "slug": "fisika",
     *       "academic_year": "2026/2027",
     *       "teacher_name": "Budi Santoso, S.Pd",
     *       "progress": 100.0
     *     },
     *     {
     *       "id": 3,
     *       "name": "Bahasa Indonesia",
     *       "slug": "bahasa-indonesia",
     *       "academic_year": "2026/2027",
     *       "teacher_name": "",
     *       "progress": 0
     *     }
     *   ]
     * }
     *
     * @response 200 scenario="Berhasil — Student belum memiliki kursus" {
     *   "data": []
     * }
     *
     * @response 401 scenario="Unauthenticated — Token tidak valid atau tidak disertakan" {
     *   "message": "Unauthenticated."
     * }
     *
     * @response 403 scenario="Forbidden — User bukan role student" {
     *   "message": "This action is unauthorized."
     * }
     *
     * @response 500 scenario="Server Error — Profil student tidak ditemukan" {
     *   "message": "Student profile not found for user #5."
     * }
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $user->loadMissing('studentProfile');

        $studentProfile = $user->studentProfile
            ?? throw new \RuntimeException('Student profile not found for user #' . $user->id);

        $courses = $this->courseService->getCourses(
            classId: $studentProfile->class_id,
            studentProfileId: $studentProfile->id,
        );

        return $this->respondSuccess(
            'Successfully get data',
            CourseResource::collection($courses),
            200
        );
    }
}
