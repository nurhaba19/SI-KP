<?php
namespace App\Models;
use CodeIgniter\Model;

class ModelsAdmin extends Model{

    public function getJurusan(){
        $build = $this->db->table('jurusan');
        $build->orderBy('id_jurusan', "DESC");
        return $build->get();
    }

    public function TambahJurusan($data){
        $build = $this->db->table('jurusan');
        $build->insert($data);
    }

    public function getJurusanByid($id){
        $build = $this->db->table('jurusan');
        $build->where('id_jurusan', $id);
        return $build->get();
    }

    public function UpdateJurusan($id, $data){
        $build = $this->db->table('jurusan');
        $build->where('id_jurusan', $id);
        $build->update($data);
    }

    public function DeleteJurusan($id){
        $build = $this->db->table('jurusan');
        $build->where('id_jurusan', $id);
        $build->delete();
    }

    //-----------------------------------------------------------

    public function getKelas(){
        $build = $this->db->table('jurusan');
        $build->join('kelas', 'kelas.id_jurusan = jurusan.id_jurusan');
        $build->orderBy('id_kelas', "DESC");
        return $build->get();
    }

    public function getKelasByid($id){
        $build = $this->db->table('kelas');
        $build->where('id_kelas', $id);
        return $build->get();
    }

    public function TambahKelas($data){
        $build = $this->db->table('kelas');
        $build->insert($data);
    }

    public function UpdateKelas($id, $data){
        $build = $this->db->table('kelas');
        $build->where('id_kelas', $id);
        $build->update($data);
    }

    public function DeleteKelas($id){
        $build = $this->db->table('kelas');
        $build->where('id_kelas', $id);
        $build->delete();
    }

    public function getNamaKelas($id){
        $build = $this->db->table('kelas');
        $build->where('id_kelas', $id);
        foreach($build->get()->getResult() as $x):
            return $x->nama_kelas;
        endforeach;
    }

    //----------------------------------------------------------------------------------

    public function getSiswa(){
        $build = $this->db->table('jurusan');
        $build->select('nama_jurusan, nama_kelas, jurusan.id_jurusan, kelas.id_kelas, nama_siswa, nis, username, id_siswa');
        $build->join('kelas', 'kelas.id_jurusan = jurusan.id_jurusan');
        $build->join('siswa', 'siswa.id_kelas = kelas.id_kelas');
        $build->orderBy('id_siswa', "DESC");
        return $build->get();
    }

    public function getSiswaByid($id){
        $build = $this->db->table('jurusan');
        $build->select('nama_jurusan, nama_kelas, jurusan.id_jurusan, kelas.id_kelas, nama_siswa, nis, username, id_siswa, jenis_kelamin, alamat');
        $build->join('kelas', 'kelas.id_jurusan = jurusan.id_jurusan');
        $build->join('siswa', 'siswa.id_kelas = kelas.id_kelas');
        $build->where('id_siswa', $id);
        return $build->get();
    }

    public function TambahSiswa($data){
        $build = $this->db->table('siswa');
        $build->insert($data);
    }

    public function UpdateSiswa($id, $data){
        $build = $this->db->table('siswa');
        $build->where('id_siswa', $id);
        $build->update($data);
    }

    public function DeleteSiswa($id){
        $build = $this->db->table('siswa');
        $build->where('id_siswa', $id);
        $build->delete();
    }

    public function getSiswaBykelas($id_kelas){
        $build = $this->db->table('jurusan');
        $build->select('nama_jurusan, nama_kelas, jurusan.id_jurusan, kelas.id_kelas, nama_siswa, nis, username, id_siswa, jenis_kelamin');
        $build->join('kelas', 'kelas.id_jurusan = jurusan.id_jurusan');
        $build->join('siswa', 'siswa.id_kelas = kelas.id_kelas');
        $build->where('kelas.id_kelas', $id_kelas);
        $build->orderBy('id_siswa', "DESC");
        return $build->get();
    }


    //----------------------------------------------------------------

    public function getIndustri(){
        $build = $this->db->table('industri');
        $build->orderBy('id_industri', "DESC");
        return $build->get();
    }

    public function getIndustriByid($id){
        $build = $this->db->table('industri');
        $build->where('id_industri', $id);
        return $build->get();
    }
    
    public function UpdateIndustri($id, $data){
        $build = $this->db->table('industri');
        $build->where('id_industri', $id);
        $build->update($data);
    }

    public function TambahIndustri($data){
        $build = $this->db->table('industri');
        $build->insert($data);
    }

    public function DeleteIndustri($id){
        $build = $this->db->table('industri');
        $build->where('id_industri', $id);
        $build->delete();
    }

    //----------------------------------------------------------------

    public function getAdmin(){
        $build = $this->db->table('admin');
        $build->orderBy('nama', "DESC");
        return $build->get();
    }

    public function getAdminByid($id){
        $build = $this->db->table('admin');
        $build->where('id', $id);
        return $build->get();
    }

    public function TambahAdmin($data){
        $build = $this->db->table('admin');
        $build->insert($data);
    }

    public function UpdateAdmin($id, $data){
        $build = $this->db->table('admin');
        $build->where('id', $id);
        $build->update($data);
    }

    public function DeleteAdmin($id){
        $build = $this->db->table('admin');
        $build->where('id', $id);
        $build->delete();
    }

    //-----------------------------------------------------------------------------

    public function getGuru(){
        $build = $this->db->table('pembimbing');
        $build->orderBy('pembimbing.id_pembimbing', "DESC");
        return $build->get();
    }

    public function getGuruByid($id){
        return $this->db->table('pembimbing')->where('id_pembimbing', $id)->get();        
    }

    public function TambahGuru($data){
        $build = $this->db->table('pembimbing');
        $build->insert($data);
    }

    public function DeleteGuru($id){
        $build = $this->db->table('pembimbing');
        $build->where('id_pembimbing', $id);
        $build->delete();
    }

    public function UpdateGuru($id, $data){
        $build = $this->db->table('pembimbing');
        $build->where('id_pembimbing',$id);
        $build->update($data);
    }

    public function FilterDataGuru($id_industri){
        $build = $this->db->table('industri_join_pembimbing');
        $build->select('pembimbing.id_pembimbing, pembimbing.nama_pembimbing, pembimbing.nip, pembimbing.nohp, pembimbing.type');
        $build->join('pembimbing', 'pembimbing.id_pembimbing = industri_join_pembimbing.id_pembimbing');
        $build->where('industri_join_pembimbing.id_industri', $id_industri);
        $build->orderBy('pembimbing.id_pembimbing', "DESC");
        $build->distinct();
        return $build->get();
    }

    public function getNamaGuru($id_pembimbing){
        $build = $this->db->table('pembimbing');
        $build->where('id_pembimbing', $id_pembimbing);
        foreach ($build->get()->getResult() as $x):
            return $x->nama_pembimbing;
        endforeach;
    }

    public function getGuruByType($type){
        $build = $this->db->table('pembimbing');
        $build->where('type', $type);
        return $build->countAllResults();
    }

    //--------------------------------------------------------------------
    public function getguruByidIndustri($id_industri){
        $build = $this->db->table('pembimbing');
        $build->join('industri_join_pembimbing', 'pembimbing.id_pembimbing = industri_join_pembimbing.id_pembimbing');
        $build->where('industri_join_pembimbing.id_industri', $id_industri);
        $build->distinct();
        return $build->get();
    }

    public function getTotalKuotaPenempatanByIndustri($id_industri){
        $build = $this->db->table('penempatan');
        $build->where('id_industri', $id_industri);
        $build->where('status', "diterima");
        $build->orWhere('status', "pending");
        return $build->countAllResults();
    }

    public function getNamaIndustriByNama($id_industri){
        $build = $this->db->table('industri');
        $build->where('id_industri', $id_industri);
        foreach ($build->get()->getResult() as $x):
            return $x->nama_industri;
        endforeach;
    }

    public function getStatusPenempatanByIdIndustri($id_siswa, $id_industri){
        $build = $this->db->table('penempatan');
        $build->where('id_industri', $id_industri);
        $build->where('id_siswa', $id_siswa);
        $build->where('status', "diterima");
        $build->orWhere('status', "pending");
        return $build->countAllResults();
    }

    public function TambahPenempatan($data){
        $build = $this->db->table('penempatan');
        $build->insert($data);
    }

    public function TambahTolakPenempatan($data){
        $build = $this->db->table('tolak_penempatan');
        $build->insert($data);
    }

    public function getPermohonanSiswaDiterima(){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, penempatan.tgl_request, penempatan.id_penempatan, penempatan.status, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan');
        $build->join('penempatan', 'industri.id_industri = penempatan.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $build->where('penempatan.status', "diterima");
        $build->where('penempatan.surat !=', "kosong");
        $build->orderBy('penempatan.id_penempatan', "DESC");
        return $build->get();
    }

    public function FilterPermohonanSiswaDiterima($id_industri){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, penempatan.tgl_request, penempatan.id_penempatan, penempatan.status, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan');
        $build->join('penempatan', 'industri.id_industri = penempatan.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $build->where('penempatan.status', "diterima");
        $build->where('penempatan.surat !=', "kosong");
        $build->where('industri.id_industri', $id_industri);
        $build->orderBy('penempatan.id_penempatan', "DESC");
        return $build->get();
    }

    public function getPermohonanSiswaDitolak(){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, penempatan.tgl_request, penempatan.id_penempatan, penempatan.status, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan');
        $build->join('penempatan', 'industri.id_industri = penempatan.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $build->where('penempatan.status', "ditolak");
        $build->orderBy('penempatan.id_penempatan', "DESC");
        return $build->get();
    }

    public function FilterPermohonanSiswaDitolak($id_industri){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, penempatan.tgl_request, penempatan.id_penempatan, penempatan.status, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan');
        $build->join('penempatan', 'industri.id_industri = penempatan.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $build->where('penempatan.status', "ditolak");
        $build->where('industri.id_industri', $id_industri);
        $build->orderBy('penempatan.id_penempatan', "DESC");
        return $build->get();
    }

    public function getPermohonanSiswaPending(){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, penempatan.tgl_request, penempatan.id_penempatan, penempatan.status, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan');
        $build->join('penempatan', 'industri.id_industri = penempatan.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $build->where('penempatan.status', "pending");
        $build->where('penempatan.surat !=', "kosong");
        $build->orderBy('penempatan.id_penempatan', "DESC");
        return $build->get();
    }

    public function FilterPermohonanSiswaPending($id_industri){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, industri.id_industri, penempatan.tgl_request, penempatan.id_penempatan, penempatan.status, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, kelas.id_kelas, jurusan.nama_jurusan');
        $build->join('penempatan', 'industri.id_industri = penempatan.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $build->where('penempatan.status', "pending");
        $build->where('penempatan.surat !=', "kosong");
        $build->where('industri.id_industri', $id_industri);
        $build->orderBy('penempatan.id_penempatan', "DESC");
        return $build->get();
    }

    public function getDetailPermohonan($id){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, industri.bidang_kerja, industri.kuota, industri.id_industri, industri.syarat, penempatan.tgl_request, penempatan.id_penempatan, penempatan.status, penempatan.tgl_request, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan');
        $build->join('penempatan', 'industri.id_industri = penempatan.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $build->where('penempatan.id_penempatan', $id);
        return $build->get();
    }

    public function updatePermohonan($id, $data){
        $build = $this->db->table('penempatan');
        $build->where('id_penempatan', $id);
        $build->update($data);

    }

    public function hapusPermohonan($id){
        $build = $this->db->table('penempatan');
        $build->where('id_penempatan', $id);
        $build->delete();
    }

    public function FilterPenempatan($id_industri){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, industri.id_industri, penempatan.id_penempatan, penempatan.status, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, kelas.id_kelas');
        $build->join('penempatan', 'penempatan.id_industri = industri.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->where('industri.id_industri', $id_industri);
        $build->orderBy('penempatan.id_penempatan', "DESC");
        return $build->get();
    }

    public function FilterPenempatanByKelas($id_kelas){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, industri.id_industri, penempatan.id_penempatan, penempatan.status, penempatan.surat, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, kelas.id_kelas');
        $build->join('penempatan', 'penempatan.id_industri = industri.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->where('siswa.id_kelas', $id_kelas);
        $build->orderBy('penempatan.id_penempatan', "DESC");
        return $build->get();
    }

    //------------------------------------------------------------------------------------------------------------------

    public function getPenempatanJoinSiswa($id_industri){
        $build = $this->db->table('siswa');
        $build->select('siswa.nis, siswa.nama_siswa, siswa.id_siswa, siswa.id_kelas, penempatan.id_penempatan, penempatan.id_industri, kelas.id_jurusan');
        $build->join('penempatan', 'penempatan.id_siswa = siswa.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->where('penempatan.id_industri', $id_industri);
        $build->orderBy('siswa.nis', "ASC");
        return $build->get();
        
    }

    public function getPenempatanByidSiswa($id_siswa){
        $build = $this->db->table('siswa');
        $build->select('siswa.nis, siswa.nama_siswa, siswa.id_siswa, siswa.id_kelas, penempatan.id_penempatan, penempatan.id_industri');
        $build->join('penempatan', 'penempatan.id_siswa = siswa.id_siswa');
        $build->where('siswa.id_siswa', $id_siswa);
        $build->where('penempatan.status', 'diterima');
        $build->orderBy('siswa.nis', "ASC");
        return $build->get();
        
    }

    public function getStatusAbsensi($id_penempatan, $tgl){
        $build = $this->db->table('absensi');
        $build->where('absensi.tgl', $tgl);
        $build->where('absensi.id_penempatan', $id_penempatan);
        foreach($build->get()->getResult() as $x):
            return $x->status;
        endforeach;
    }

    public function inputRekapAbsen($data){
        $build = $this->db->table('absensi');
        $build->insert($data);
    }

    public function updateRekapAbsen($id, $data){
        $build = $this->db->table('absensi');
        $build->where('id_absen', $id);
        $build->update($data);
    }

    public function hapusRekapAbsen($id_penempatan, $tgl){
        $build = $this->db->table('absensi');
        $build->where('absensi.id_penempatan', $id_penempatan);
        $build->where('absensi.tgl', $tgl);
        $build->delete();
    }

    public function getDataSiswaByIdPenempatan($id_penempatan){
        $build = $this->db->table('industri');
        $build->select('penempatan.id_penempatan, siswa.nis, siswa.nama_siswa, industri.nama_industri, kelas.nama_kelas, jurusan.nama_jurusan');
        $build->join('penempatan', 'penempatan.id_industri = industri.id_industri');
        $build->join('siswa', 'siswa.id_siswa = penempatan.id_siswa');
        $build->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $build->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $build->where('penempatan.id_penempatan', $id_penempatan);
        return $build->get();
    }

    public function getAbsensiPerSiswa($id_penempatan){
        $build = $this->db->table('penempatan');
        $build->select('penempatan.id_penempatan, absensi.id_absen, absensi.tgl, absensi.status, absensi.catatan');
        $build->join('absensi', 'absensi.id_penempatan = penempatan.id_penempatan');
        $build->where('penempatan.id_penempatan', $id_penempatan);
        $build->orderBy('absensi.tgl', "DESC");
        return $build->get();
    }

    public function getAbsensiPerSiswaByidIndustriAndIdPenempatan($id_siswa, $id_industri){
        $build = $this->db->table('penempatan');
        $build->select('penempatan.id_penempatan, absensi.id_absen, absensi.tgl, absensi.status, absensi.catatan');
        $build->join('absensi', 'absensi.id_penempatan = penempatan.id_penempatan');
        $build->where('penempatan.id_siswa', $id_siswa);
        $build->where('penempatan.id_industri', $id_industri);
        $build->orderBy('absensi.tgl', "DESC");
        return $build->get();
    }

    public function getAbsensiByIdPenempatan($id_penempatan, $value, $start, $finish){
        $build = $this->db->table('absensi');
        $build->select('absensi.status');
        $build->where('absensi.id_penempatan', $id_penempatan);
        $build->where('absensi.status', $value);
        $build->where("absensi.tgl BETWEEN '$start' AND '$finish'");
        return $build->countAllResults();
    }

    public function getTotalAbsensiByIdPenempatan($id_penempatan, $start, $finish){
        $build = $this->db->table('absensi');
        $build->select('absensi.status');
        $build->where('absensi.id_penempatan', $id_penempatan);
        $build->where("absensi.tgl BETWEEN '$start' AND '$finish'");
        return $build->countAllResults();
    }

    public function getAbsensiPerSiswaRekap($id_penempatan, $start, $finish){
        $build = $this->db->table('absensi');
        $build->where('absensi.id_penempatan', $id_penempatan);
        $build->where("absensi.tgl BETWEEN '$start' AND '$finish'");
        $build->orderBy('absensi.tgl', "DESC");
        return $build->get();
    }

    //----------------------------------------------------------------

    public function getTotalJurnalByIdPenempatan($id_penempatan){
        $build = $this->db->table('jurnal');
        $build->where('jurnal.id_penempatan', $id_penempatan);
        return $build->countAllResults();
    }

    public function getJurnalByIdPenempatan($id_penempatan){
        $build = $this->db->table('jurnal');
        $build->where('jurnal.id_penempatan', $id_penempatan);
        return $build->get(); 
    }

    public function getJurnalByIdPenempatanAndDate($id_penempatan){
        $build = $this->db->table('jurnal');
        $build->where('jurnal.id_penempatan', $id_penempatan);
        foreach ($build->get()->getResult() as $x):

            if(date('Y-m-d', strtotime($x->tgl_kumpul)) == date('Y-m-d')){

                return 1;
            
            }

        endforeach;
    }

    public function inputnilaiJurnal($id_jurnal, $data){
        $build = $this->db->table('jurnal');
        $build->where('jurnal.id_jurnal', $id_jurnal);
        $build->update($data);
    }

    public function getTotalStatusJurnalPending($id_penempatan){
        $build = $this->db->table('jurnal');
        $build->where('jurnal.id_penempatan', $id_penempatan);
        $build->where('jurnal.status', 'P');
        return $build->countAllResults();
    }

    public function getTotalStatusJurnalApproval($id_penempatan){
        $build = $this->db->table('jurnal');
        $build->where('jurnal.id_penempatan', $id_penempatan);
        $build->where('jurnal.status', 'Y');
        return $build->countAllResults();
    }

    public function getTotalStatusJurnalUnapproval($id_penempatan){
        $build = $this->db->table('jurnal');
        $build->where('jurnal.id_penempatan', $id_penempatan);
        $build->where('jurnal.status', 'N');
        return $build->countAllResults();
    }

    //-----------------------------------------------------------------------

    public function getRataRataNilaiJurnal($id_penempatan){
        $build = $this->db->table('jurnal');
        $build->selectAvg('jurnal.nilai');
        $build->where('id_penempatan', $id_penempatan);
        foreach ($build->get()->getResult() as $x):
            return $x->nilai;
        endforeach;
    }

    //-----------------------------------------------------------------

    public function getAspekByIdJurusan($id_jurusan){
        $build = $this->db->table('aspek_penilaian');
        $build->where('aspek_penilaian.id_jurusan', $id_jurusan);
        $build->orderBy('aspek_penilaian.id_aspek', "DESC");
        return $build->get();
    }

    public function TambahAspek($data){
        $build = $this->db->table('aspek_penilaian');
        $build->insert($data);
    }

    public function HapusAspek($id_aspek){
        $build = $this->db->table('aspek_penilaian');
        $build->where('id_aspek', $id_aspek);
        $build->delete();
    }

    public function getAspekByid($id_aspek){
        $build = $this->db->table('aspek_penilaian');
        $build->where('id_aspek', $id_aspek);
        return $build->get();
    }

    public function EditAspek($id_aspek, $data){
        $build = $this->db->table('aspek_penilaian');
        $build->where('id_aspek', $id_aspek);
        $build->update($data);
    }

    public function getTotalAspekByJurusan($id_jurusan){
        $build = $this->db->table('aspek_penilaian');
        $build->where('id_jurusan', $id_jurusan);
        return $build->countAllResults();
    }

    public function getIdJurusanByIdkelas($id_kelas){
        $build = $this->db->table('kelas');
        $build->where('id_kelas', $id_kelas);
        foreach ($build->get()->getResult() as $x):
            return $x->id_jurusan;
        endforeach;
    }

    public function getDataAspekByidJurusan($id_jurusan){
        $build = $this->db->table('aspek_penilaian');
        $build->where('id_jurusan', $id_jurusan);
        return $build->get();
    }

    public function deletenilai($id_penempatan){
        $build = $this->db->table('nilai');
        $build->where('id_penempatan', $id_penempatan);
        $build->delete();
    }

    public function inputnilai($data){
        $build = $this->db->table('nilai');
        $build->insert($data);
    }

    public function getNilaiAngkaByIdPenempatanAndIdAspek($id_penempatan, $id_aspek){
        $build = $this->db->table('nilai');
        $build->where('id_penempatan', $id_penempatan);
        $build->where('id_aspek', $id_aspek);
        foreach ($build->get()->getResult() as $x):
            return $x->nilai_angka;
        endforeach;
    }

    public function getNilaiHurufByIdPenempatanAndIdAspek($id_penempatan, $id_aspek){
        $build = $this->db->table('nilai');
        $build->where('id_penempatan', $id_penempatan);
        $build->where('id_aspek', $id_aspek);
        foreach ($build->get()->getResult() as $x):
            return $x->nilai_huruf;
        endforeach;
    }

    public function getRataRataNilai($id_penempatan){
        $build = $this->db->table('nilai');
        $build->selectAvg('nilai.nilai_angka');
        $build->where('id_penempatan', $id_penempatan);
        foreach ($build->get()->getResult() as $x):
            return $x->nilai_angka;
        endforeach;
    }

    //---------------------------------------------------------------

    public function getKategoriAgenda(){
        $build = $this->db->table('kategori_agenda');
        $build->orderBy('id_kategoriagenda', "DESC");
        return $build->get();
    }

    public function tambahKategoriAgenda($data){
        $build = $this->db->table('kategori_agenda');
        $build->insert($data);
    }

    public function getKategoriAgendaById($id_kategoriagenda){
        $build = $this->db->table('kategori_agenda');
        $build->where('id_kategoriagenda', $id_kategoriagenda);
        return $build->get();
    }

    public function updateKategoriAgenda($id_kategoriagenda, $data){
        $build = $this->db->table('kategori_agenda');
        $build->where('id_kategoriagenda', $id_kategoriagenda);
        $build->update($data);
    }

    public function deleteKategoriAgenda($id_kategoriagenda){
        $build = $this->db->table('kategori_agenda');
        $build->where('id_kategoriagenda', $id_kategoriagenda);
        $build->delete();
    }

    //--------------------------------------------------------------------

    public function getAgenda(){
        $build = $this->db->table('kategori_agenda');
        $build->select('kategori_agenda.nama_kategoriagenda, agenda.judul, agenda.dilihat, agenda.id_agenda, agenda.tgl');
        $build->join('agenda', 'agenda.id_kategoriagenda = kategori_agenda.id_kategoriagenda');
        $build->orderBy('id_agenda', "DESC");
        return $build->get();
    }

    public function TambahAgenda($data){
        $build = $this->db->table('agenda');
        $build->insert($data);
    }

    public function getAgendaByid($id_agenda){
        $build = $this->db->table('agenda');
        $build->where('id_agenda', $id_agenda);
        return $build->get();
    }

    public function UpdateAgenda($id_agenda, $data){
        $build = $this->db->table('agenda');
        $build->where('id_agenda', $id_agenda);
        $build->update($data);
    }

    public function DeleteAgenda($id_agenda){
        $build = $this->db->table('agenda');
        $build->where('id_agenda', $id_agenda);
        $build->delete();
    }

    //-------------------------------------------------------------------------------

    public function SimpanChat($data){
        $build = $this->db->table('chat');
        $build->insert($data);
    }

    public function HapusChat($id_chat){
        $build = $this->db->table('chat');
        $build->where('id_chat', $id_chat);
        $build->delete();
    }

    public function getChat($id_pembimbing){
        $build = $this->db->table('pembimbing');
        $build->select('pembimbing.id_pembimbing, pembimbing.nama_pembimbing, chat.id_chat, chat.isi, chat.lampiran, chat.tgl, chat.pengirim');
        $build->join('chat', 'pembimbing.id_pembimbing = chat.id_pembimbing');
        $build->where('chat.id_pembimbing', $id_pembimbing);
        $build->orderBy('chat.id_chat', 'DESC');
        return $build->get();
    } 

    //------------------------------ ------------------------

    public function getKartuPenempatanPerSiswa($id_siswa){
        $build = $this->db->table('penempatan');
        $build->select('industri.nama_industri, industri.bidang_kerja, penempatan.tgl_request, penempatan.status, penempatan.surat');
        $build->join('industri', 'industri.id_industri = penempatan.id_industri');
        $build->where('penempatan.id_siswa', $id_siswa);
        return $build->get();
    }

    public function getNamaIndustriByIdSiswa($id_siswa){
        $build = $this->db->table('penempatan');
        $build->select('industri.nama_industri');
        $build->join('industri', 'industri.id_industri = penempatan.id_industri');
        $build->where('penempatan.id_siswa', $id_siswa);
        foreach ($build->get()->getResult() as $x):
            return $x->nama_industri;
        endforeach;
    }

    public function getJurnalByIdSiswa($id_siswa){
        $build = $this->db->table('penempatan');
        $build->select('jurnal.judul, jurnal.nilai, penempatan.id_siswa, jurnal.status');
        $build->join('jurnal', 'jurnal.id_penempatan = penempatan.id_penempatan');
        $build->where('penempatan.id_siswa', $id_siswa);
        return $build->get();
    }

    public function getDetailNilaiAngkaByidSiswa($id_siswa, $id_aspek){
        $build = $this->db->table('penempatan');
        $build->select('nilai.nilai_angka');
        $build->join('nilai', 'nilai.id_penempatan = penempatan.id_penempatan');
        $build->where('penempatan.id_siswa', $id_siswa);
        $build->where('nilai.id_aspek', $id_aspek);
        foreach ($build->get()->getResult() as $x):
            return $x->nilai_angka;
        endforeach;
    }

    public function getDetailNilaiHurufByidSiswa($id_siswa, $id_aspek){
        $build = $this->db->table('penempatan');
        $build->select('nilai.nilai_huruf');
        $build->join('nilai', 'nilai.id_penempatan = penempatan.id_penempatan');
        $build->where('penempatan.id_siswa', $id_siswa);
        $build->where('nilai.id_aspek', $id_aspek);
        foreach ($build->get()->getResult() as $x):
            return $x->nilai_huruf;
        endforeach;
    }

    public function CekPenempatan($id_siswa){
        $build = $this->db->table('penempatan');
        $build->where('penempatan.id_siswa', $id_siswa);
        return $build->countAllResults();
    }

    public function getIdPenempatanByidSiswa($id_siswa){
        $build = $this->db->table('penempatan');
        $build->select('penempatan.id_penempatan');
        $build->where('penempatan.id_siswa', $id_siswa);
        foreach ($build->get()->getResult() as $x):
            return $x->id_penempatan;
        endforeach;
    }

    public function getSiswaByIndustri($id_industri){
        $build = $this->db->table('jurusan');
        $build->select('siswa.nama_siswa, siswa.nis, siswa.jenis_kelamin, kelas.nama_kelas, jurusan.nama_jurusan, siswa.id_siswa');
        $build->join('kelas', 'kelas.id_jurusan = jurusan.id_jurusan');
        $build->join('siswa', 'siswa.id_kelas = kelas.id_kelas');
        $build->join('penempatan', 'penempatan.id_siswa = siswa.id_siswa');
        $build->where('penempatan.id_industri', $id_industri);
        return $build->get();
    }

    public function getNamaIndustriByIdIndustri($id_industri){
        $build = $this->db->table('industri');
        $build->where('industri.id_industri', $id_industri);
        foreach ($build->get()->getResult() as $x):
            return $x->nama_industri;
        endforeach;
    }

    //--------------------------------------------------------------

    public function UpdateInstansi($data){
        $build = $this->db->table('instansi');
        $build->update($data);
    }

    //------------------------------------------------

    public function getIdKelasByIdsiswa($id_siswa){
        $build = $this->db->table('siswa');
        $build->select('siswa.id_kelas');
        $build->where('siswa.id_siswa', $id_siswa);
        foreach ($build->get()->getResult() as $x):
            return $x->id_kelas;
        endforeach;
    }

    public function getIndustriByidPembimbing($id_pembimbing){
        $build = $this->db->table('industri');
        $build->select('industri.nama_industri, industri.id_industri');
        $build->join('industri_join_pembimbing', 'industri_join_pembimbing.id_industri = industri.id_industri');
        $build->where('industri_join_pembimbing.id_pembimbing', $id_pembimbing);
        return $build->get();
    }

    public function getAlasanPenolakan($id_penempatan){
        $build = $this->db->table('tolak_penempatan');
        $build->select('alasan');
        $build->where('id_penempatan', $id_penempatan);
        foreach ($build->get()->getResult() as $x):
            return $x->alasan;
        endforeach;
    }

    //------------------------------

    public function getStatusJurnalHarian($id_penempatan, $tgl_request){
        $build = $this->db->table('jurnal_harian');
        $build->select('status, tgl');
        $build->where('id_penempatan', $id_penempatan);
        foreach ($build->get()->getResult() as $x):
            if(date('Y-m-d', strtotime($x->tgl)) == $tgl_request){
                return $x->status;
            }
        endforeach;
    }

    public function getJurnalHarianByTgl($id_penempatan, $tgl_request){
        $build = $this->db->table('jurnal_harian');
        $build->select('status, tgl, kegiatan');
        $build->where('id_penempatan', $id_penempatan);
        foreach ($build->get()->getResult() as $x):
            if(date('Y-m-d', strtotime($x->tgl)) == $tgl_request){
                return $x->kegiatan;
            }
        endforeach;
    }

    public function getIdJurnalHarian($id_penempatan, $tgl_request){
        $build = $this->db->table('jurnal_harian');
        $build->select('status, tgl, kegiatan, id_jurnal_harian');
        $build->where('id_penempatan', $id_penempatan);
        foreach ($build->get()->getResult() as $x):
            if(date('Y-m-d', strtotime($x->tgl)) == $tgl_request){
                return $x->id_jurnal_harian;
            }
        endforeach;
    }

    public function updateJurnalHarian($id_jurnal_harian, $data){
        $build = $this->db->table('jurnal_harian');
        $build->where('id_jurnal_harian', $id_jurnal_harian);
        $build->update($data);

    }

    public function hapusJurnalHarian($id_penempatan, $tgl){
        $build = $this->db->table('jurnal_harian');
        $build->where('id_penempatan', $id_penempatan);
        $build->where('tgl', $tgl);
        $build->delete();
    }

    public function getTotalJurnalHarianPending($id_penempatan, $start, $finish){
        $build = $this->db->table('jurnal_harian');
        $build->where('jurnal_harian.id_penempatan', $id_penempatan);
        $build->where('jurnal_harian.status', "P");
        $build->where("jurnal_harian.tgl BETWEEN '$start' AND '$finish'");
        return $build->countAllResults();
    }

    public function getTotalJurnalHarianApproval($id_penempatan, $start, $finish){
        $build = $this->db->table('jurnal_harian');
        $build->where('jurnal_harian.id_penempatan', $id_penempatan);
        $build->where('jurnal_harian.status', "Y");
        $build->where("jurnal_harian.tgl BETWEEN '$start' AND '$finish'");
        return $build->countAllResults();
    }

    public function getTotalJurnalHarianUnapproval($id_penempatan, $start, $finish){
        $build = $this->db->table('jurnal_harian');
        $build->where('jurnal_harian.id_penempatan', $id_penempatan);
        $build->where('jurnal_harian.status', "N");
        $build->where("jurnal_harian.tgl BETWEEN '$start' AND '$finish'");
        return $build->countAllResults();
    }

    public function getTotalJurnalHarian($id_penempatan, $start, $finish){
        $build = $this->db->table('jurnal_harian');
        $build->where('jurnal_harian.id_penempatan', $id_penempatan);
        $build->where("jurnal_harian.tgl BETWEEN '$start' AND '$finish'");
        return $build->countAllResults();
    }

    public function getJurnalHarianDetail($id_penempatan, $start, $finish){
        $build = $this->db->table('jurnal_harian');
        $build->where('jurnal_harian.id_penempatan', $id_penempatan);
        $build->where("jurnal_harian.tgl BETWEEN '$start' AND '$finish'");
        return $build->get();
    }

    public function getjurnalharianByidpenempatan($id_penempatan){
        $build = $this->db->table('jurnal_harian');
        $build->select('status');
        $build->where('id_penempatan', $id_penempatan);
        return $build->get();
    }

    public function getCatatanJurnalHarian($id_penempatan, $tgl){
        $build = $this->db->table('jurnal_harian');
        $build->where('tgl', $tgl);
        $build->where('id_penempatan', $id_penempatan);
        foreach ($build->get()->getResult() as $x):
            return $x->catatan;
        endforeach;
    }

    //-------------------------------------------------------

    public function penempatanpembimbing($id_pembimbing, $id_industri){
        $data = array(
            'id_industri' => $id_industri,
            'id_pembimbing' => $id_pembimbing
        );
        $this->db->table('industri_join_pembimbing')
                ->where('id_pembimbing', $id_pembimbing)
                ->where('id_industri', $id_industri)
                ->delete();
        $this->db->table('industri_join_pembimbing')->insert($data);
        
    }

    public function bersihkanPenempatanPembimbing($id_pembimbing){
        $this->db->table('industri_join_pembimbing')
        ->where('id_pembimbing', $id_pembimbing)
        ->delete();
    }

    public function getidpembimbingByNamaNipUsername($nama_pembimbing, $nip, $username){
        $build = $this->db->table('pembimbing');
        $build->where('username', $username);
        $build->where('nip', $nip);
        $build->where('nama_pembimbing', $nama_pembimbing);
        foreach($build->get()->getResult() as $x){
            return $x->id_pembimbing;
        }
    }

    public function CheckUsernamePembimbing($username){
        return $this->db->table('pembimbing')->where('username', $username)->get();
    }

    public function getNamaIndustriByIdPembimbing($id_pembimbing){
        $build = $this->db->table('pembimbing');
        $build->select('industri.nama_industri');
        $build->join('industri_join_pembimbing', 'pembimbing.id_pembimbing = industri_join_pembimbing.id_pembimbing');
        $build->join('industri', 'industri.id_industri = industri_join_pembimbing.id_industri');
        $build->where('industri_join_pembimbing.id_pembimbing', $id_pembimbing);
        return $build->get();
    }

}

?>