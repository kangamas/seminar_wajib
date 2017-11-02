<?php
$action = isset( $_GET['a'] ) ? $_GET['a'] : 'data';

// Nilai default data yang dikembalikan ke client
$res = array(
    'result' => 'error', 
    'action' => $action,
    'id'     => 0,
    'msg'    => 'Terjadi kesalahan!', 
    'html'   => '');
    
// mssql_connect('IBM', 'sa', 'ju5t4^dm1n');  
// mssql_select_db('testdb'); 
include '../../koneksi.php';

function parse_template( $data = array() ) {
    $row_template = '
    <tr data-id="%id%">
        <td class="nomor" align="center">%no%</td>
        <td data-name="nim">%nim%</td>
        <td data-name="nama">%nama%</td>
        <td data-name="prodi" align="center">%prodi%</td>
        <td data-name="tanggal">%tanggal%</td>
        <td data-name="tmp">%tmp%</td>
    </tr>';
    return preg_replace_callback('/%([a-zA-Z0-9\_]+)%/', function($matches) use ($data) {
        return isset($data[$matches[1]]) ? $data[$matches[1]] : '';
    }, $row_template);
}
function mssql_insert_id() {
    $id = false;
    $res = mssql_query('SELECT @@identity AS id');
    if ($row = mssql_fetch_row($res)) {
        $id = trim($row[0]);
    }
    mssql_free_result($res);
    return $id;
}

switch($action):
    case 'data':
        $query = mssql_query("SELECT s.npm as nim,m.Nama as nama,LEFT(m.FSJK,2) as prodi,s.tgl as tanggal,s.ket as tmp,s.rowid as id
                                    from sertifikasi s,Mhs m 
                                    where jenis='S005' and tgl='2016-04-29' and m.Npm=s.npm
                                    order by s.rowid desc");
        if ( mssql_num_rows($query) > 0 ) {
            $no = 1;
            while( $row = mssql_fetch_array($query) ) {
                $row['no'] = $no;
                $res['html'].= parse_template($row);
                $no++;
            }
            $res['result'] = 'ok';
        } else {
            $res['html'] = '<tr><td align="center" colspan="6">Data masih kosong!</td></tr>';
        }
    break;
    case 'input': case 'ubah':        
        $nim    = strip_tags($_POST['nim']);
        $nama   = strip_tags($_POST['nama']);
        $prodi     = strip_tags($_POST['prodi']);
        $tanggal = strip_tags($_POST['tanggal']);
        $tmp = strip_tags($_POST['tmp']);
        $error  = '';
        // echo "hahahahh=$id";
        // Validasi input kosong
        if ( empty($nim)) {
            $res['msg'] = 'NPM harus diisi!';
        } else {
            $sql = "INSERT INTO sertifikasi (npm,jenis,tgl,ket)VALUES('$nim', 'S005','2016-04-29','HOTEL CIUMBELEUIT'))";
            $res['msg'] = '1 Data berhasil ditambahkan..';
            if ($action == 'ubah') {
                $id  = $_GET['id'];                               
                $sql = "UPDATE mahasiswa SET npm='$nim', nama='$nama', jk='$jk', alamat='$alamat' WHERE id=$id";
                $res['id']  = $id;
                $res['msg'] = '1 Data berhasil di-update..';  
            }
            if ( mssql_query($sql) ) {
                
                if ($action == 'input')
                    $res['id'] = mssql_insert_id();
                $data = array('id'=>$res['id'], 'no'=>1) + compact('nim','nama', 'prodi', 'tanggal','tmp');
                $res['html']   = parse_template($data);                
                $res['result'] = 'ok'; 
            }
        }
    break;
    case 'hapus':
        $id = $_GET['id']; 
        if ( mssql_query("DELETE FROM mhs WHERE id=$id") ) {
            $res['msg']    = '1 Data berhasil dihapus..';
            $res['id']     = $id;
            $res['result'] = 'ok';
        }
    break;
endswitch;
// tampilkan hasil dalam format JSON
echo json_encode($res);