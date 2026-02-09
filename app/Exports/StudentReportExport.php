<?php

namespace App\Exports;

use App\Models\Grade;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class StudentReportExport implements FromCollection, WithHeadings, WithCustomStartCell
{
    protected $siswa;
    protected $mapelId;

    public function __construct($siswaId, $mapelId)
    {
        $this->siswa = Siswa::with('kelas')->findOrFail($siswaId);
        $this->mapelId = $mapelId;
    }

    public function startCell(): string
    {
        return 'A5';
    }

    public function collection()
    {
        return Grade::with('gradeType')
            ->where('siswa_id', $this->siswa->id)
            ->whereHas('teachingAssignment', function ($q) {
                $q->where('mapel_id', $this->mapelId);
            })
            ->get()
            ->map(function ($n) {
                return [
                    'Jenis Nilai' => $n->gradeType->nama,
                    'Nilai'      => $n->nilai,
                ];
            });
    }

    public function headings(): array
    {
        return [
            ['LAPORAN AKADEMIK SISWA'],
            [],
            ['Nama Siswa', ': ' . $this->siswa->nama],
            ['NIS', ': ' . $this->siswa->nis],
            ['Kelas', ': ' . ($this->siswa->kelas->nama_kelas ?? '-')],
            [],
            ['Jenis Nilai', 'Nilai']
        ];
    }
}
