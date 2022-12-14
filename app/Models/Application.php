<?php
namespace App\Models;

use CodeIgniter\Model;

class Application extends Model{

    public function getApp(){
        $build = $this->db->table('instansi');
        return $build->get();
    }

    public function getBanner(){
        $build = $this->db->table('banner');
        return $build->get();
    }

    public function editBanner($id, $data){
        $build = $this->db->table('banner');
        $build->where('id', $id);
        $build->update($data);
    }
    
    //------------------------------

    public function getAgendaLimit($limit){
        $build = $this->db->table('kategori_agenda');
        $build->select('kategori_agenda.nama_kategoriagenda, agenda.judul, agenda.slug, agenda.isi, agenda.gambar, agenda.file, agenda.dilihat, agenda.tgl');
        $build->join('agenda', 'agenda.id_kategoriagenda = kategori_agenda.id_kategoriagenda');
        $build->orderBy('id_agenda', "DESC");
        $build->limit($limit);
        return $build->get();
    }

    public function getAgenda(){
        $build = $this->db->table('kategori_agenda');
        $build->select('kategori_agenda.nama_kategoriagenda, agenda.judul, agenda.slug, agenda.isi, agenda.gambar, agenda.file, agenda.dilihat, agenda.tgl');
        $build->join('agenda', 'agenda.id_kategoriagenda = kategori_agenda.id_kategoriagenda');
        $build->orderBy('id_agenda', "DESC");
        return $build->get();
    }

    public function getTotalAgendaByKategori($id_kategoriagenda){
        $build = $this->db->table('agenda');
        $build->select('agenda.id_agenda');
        $build->where('agenda.id_kategoriagenda', $id_kategoriagenda);
        return $build->countAllResults();
    }

    public function getAgendaPopuler($limit){
        $build = $this->db->table('kategori_agenda');
        $build->select('kategori_agenda.nama_kategoriagenda, agenda.judul, agenda.slug, agenda.isi, agenda.gambar, agenda.file, agenda.dilihat, agenda.tgl');
        $build->join('agenda', 'agenda.id_kategoriagenda = kategori_agenda.id_kategoriagenda');
        $build->orderBy('agenda.dilihat', "DESC");
        $build->limit($limit);
        return $build->get();
    }

    public function getAgendaByNamaKategori($nama_kategoriagenda){
        $build = $this->db->table('kategori_agenda');
        $build->select('kategori_agenda.nama_kategoriagenda, agenda.judul, agenda.slug, agenda.isi, agenda.gambar, agenda.file, agenda.dilihat, agenda.tgl');
        $build->join('agenda', 'agenda.id_kategoriagenda = kategori_agenda.id_kategoriagenda');
        $build->where('kategori_agenda.nama_kategoriagenda', $nama_kategoriagenda);
        $build->orderBy('agenda.dilihat', "DESC");
        return $build->get();
    }

    public function FilterAgenda($nama_kategoriagenda){
        $build = $this->db->table('kategori_agenda');
        $build->select('kategori_agenda.nama_kategoriagenda, agenda.judul, agenda.slug, agenda.isi, agenda.gambar, agenda.file, agenda.dilihat, agenda.tgl');
        $build->join('agenda', 'agenda.id_kategoriagenda = kategori_agenda.id_kategoriagenda');
        $build->like('agenda.judul', $nama_kategoriagenda);
        $build->orderBy('agenda.dilihat', "DESC");
        return $build->get();
    }

    public function getAgendaByslug($slug){
        $build = $this->db->table('kategori_agenda');
        $build->select('kategori_agenda.nama_kategoriagenda, agenda.judul, agenda.slug, agenda.isi, agenda.gambar, agenda.file, agenda.dilihat, agenda.tgl');
        $build->join('agenda', 'agenda.id_kategoriagenda = kategori_agenda.id_kategoriagenda');
        $build->where('agenda.slug', $slug);
        return $build->get();
    }

    public function getJudulAgendaByslug($slug){
        $build = $this->db->table('kategori_agenda');
        $build->select('kategori_agenda.nama_kategoriagenda, agenda.judul, agenda.slug, agenda.isi, agenda.gambar, agenda.file, agenda.dilihat, agenda.tgl');
        $build->join('agenda', 'agenda.id_kategoriagenda = kategori_agenda.id_kategoriagenda');
        $build->where('agenda.slug', $slug);
        foreach ($build->get()->getResult() as $x):
            return $x->judul;
        endforeach;
    }

    public function CounterAgenda($slug){
        $build = $this->db->table('agenda');
        $build->select('agenda.dilihat');
        $build->where('agenda.slug', $slug);
        foreach ($build->get()->getResult() as $x):
            $total_dilihat = $x->dilihat;
        endforeach;

        $data = array(
            'dilihat' => $total_dilihat + 1
        );

        $build = $this->db->table('agenda');
        $build->where('agenda.slug', $slug);
        $build->update($data);
    }

    //------------------------------

    public function getIndustriPopuler($limit){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, industri.slug, industri.bidang_kerja, industri.foto, industri.deskripsi, COUNT(industri.nama_industri) AS total_siswa, industri.kuota, industri.id_industri');
        $build->join('penempatan', 'penempatan.id_industri = industri.id_industri', 'LEFT');
        $build->orderBy('total_siswa', "DESC");
        $build->limit($limit);
        $build->groupBy('penempatan.id_industri');
        return $build->get();   
    }

    public function FilterIndustri($nama_industri){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, industri.slug, industri.bidang_kerja, industri.foto, industri.deskripsi, industri.kuota, industri.id_industri');
        $build->like('industri.nama_industri', $nama_industri);
        return $build->get();
    }

    public function getIndustriBySlug($slug){
        $build = $this->db->table('industri');
        $build->select('*');
        $build->where('slug', $slug);
        return $build->get();
    }

    public function getNamaIndustriBySlug($slug){
        $build = $this->db->table('industri');
        $build->select('*');
        $build->where('slug', $slug);
        foreach ($build->get()->getResult() as $x):
            return $x->nama_industri;
        endforeach;
    }

    public function getIdIndustriByslug($slug){
        $build = $this->db->table('industri');
        $build->where('slug', $slug);
        foreach ($build->get()->getResult() as $x):
            return $x->id_industri;
        endforeach;
    }

    public function getSiswaTerdaftarIndustriByIdindustri($id_industri){
        $build = $this->db->table('kelas');
        $build->select('siswa.nama_siswa, kelas.nama_kelas, penempatan.status');
        $build->join('siswa', 'kelas.id_kelas = siswa.id_kelas');
        $build->join('penempatan', 'siswa.id_siswa = penempatan.id_siswa');
        $build->where('penempatan.id_industri', $id_industri);
        return $build;

    }

    //----------------------------------------------------------------

    public function getTopSiswaAbsensiTerbaik($limit){
        $build = $this->db->table('kelas');
        $build->select('siswa.nama_siswa, kelas.nama_kelas, COUNT(absensi.id_absen) AS total_absensi');
        $build->join('siswa', 'siswa.id_kelas = kelas.id_kelas');
        $build->join('penempatan', 'penempatan.id_siswa = siswa.id_siswa');
        $build->join('absensi', 'absensi.id_penempatan = penempatan.id_penempatan');
        $build->where('absensi.status', 'hadir');
        $build->limit($limit);
        $build->orderBy('total_absensi', "DESC");
        $build->groupBy('absensi.id_penempatan');
        return $build->get();
    }

    public function getTopSiswaJurnalTerbaik($limit){
        $build = $this->db->table('kelas');
        $build->select('siswa.nama_siswa, kelas.nama_kelas, COUNT(jurnal_harian.id_jurnal_harian) AS total_jurnal');
        $build->join('siswa', 'siswa.id_kelas = kelas.id_kelas');
        $build->join('penempatan', 'penempatan.id_siswa = siswa.id_siswa');
        $build->join('jurnal_harian', 'jurnal_harian.id_penempatan = penempatan.id_penempatan');
        $build->where('jurnal_harian.status', "Y");
        $build->limit($limit);
        $build->orderBy('total_jurnal', "DESC");
        $build->groupBy('jurnal_harian.id_penempatan');
        return $build->get();
    }   

    public function getTotalAbsensiByIdIndustri($id_industri){
        $build = $this->db->table('penempatan');
        $build->select('abseni.id_absen');
        $build->join('absensi', 'absensi.id_penempatan = penempatan.id_penempatan');
        $build->where('penempatan.id_industri', $id_industri);
        $build->where('absensi.status', "hadir");
        return $build->countAllResults();
    }

    public function getTotalJurnalByIdIndustri($id_industri){
        $build = $this->db->table('penempatan');
        $build->select('jurnal_harian.id_jurnal');
        $build->join('jurnal_harian', 'jurnal_harian.id_penempatan = penempatan.id_penempatan');
        $build->where('penempatan.id_industri', $id_industri);
        $build->where('jurnal_harian.status', 'Y');
        return $build->countAllResults();
    }


    //--------------------------------------------------------------

    public function FilterPenempatan($id_siswa){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, industri.id_industri, penempatan.id_penempatan, penempatan.status, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, kelas.id_kelas, penempatan.id_penempatan');
        $build->join('penempatan', 'penempatan.id_industri = industri.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->where('siswa.id_siswa', $id_siswa);
        $build->orderBy('penempatan.id_penempatan', "DESC");
        return $build->get();
    }

    public function TambahJurnal($data){
        $build = $this->db->table('jurnal');
        $build->insert($data);
    }

    public function Hapusjurnal($id_jurnal){
        $build = $this->db->table('jurnal');
        $build->where('jurnal.id_jurnal', $id_jurnal);
        $build->delete();
    }

    //------------------------------

    public function TambahJurnalHarian($data){
        $build = $this->db->table('jurnal_harian');
        $build->insert($data);
    }

    public function getJurnalHarian($id_penempatan){
        $build = $this->db->table('jurnal_harian');
        $build->where('id_penempatan', $id_penempatan);
        $build->orderBy('tgl', "DESC");
        return $build->get();
    }

    public function hapusjurnalHarian($id_jurnal_harian){
        $build = $this->db->table('jurnal_harian');
        $build->where('id_jurnal_harian', $id_jurnal_harian);
        $build->delete();
    }

    public function cekjurnalharian($id_penempatan){
        $build = $this->db->table('jurnal_harian');
        $build->where('id_penempatan', $id_penempatan);
        foreach ($build->get()->getResult() as $x):
            if(date('Y-m-d') == date('Y-m-d', strtotime($x->tgl))):
                return 1;
                break;
            endif;
        endforeach;
    }

    //--------------------------------------------------------------
    
    public function getTotalPembimbingIndustri($id_penempatan){
        $build = $this->db->table('penempatan');
        $build->select('pembimbing.nama_pembimbing, pembimbing.nohp');
        $build->join('industri', 'industri.id_industri = penempatan.id_industri');
        $build->join('industri_join_pembimbing', 'industri_join_pembimbing.id_industri = industri.id_industri');
        $build->join('pembimbing', 'pembimbing.id_pembimbing = industri_join_pembimbing.id_pembimbing');
        $build->where('penempatan.id_penempatan', $id_penempatan);
        $build->where('pembimbing.type', 'I');
        return $build->get();
    }

    public function getTotalPembimbingSekolah($id_penempatan){
        $build = $this->db->table('penempatan');
        $build->select('pembimbing.nama_pembimbing, pembimbing.nohp');
        $build->join('industri', 'industri.id_industri = penempatan.id_industri');
        $build->join('industri_join_pembimbing', 'industri_join_pembimbing.id_industri = industri.id_industri');
        $build->join('pembimbing', 'pembimbing.id_pembimbing = industri_join_pembimbing.id_pembimbing');
        $build->where('penempatan.id_penempatan', $id_penempatan);
        $build->where('pembimbing.type', 'S');
        return $build->get();
    }

}
?>