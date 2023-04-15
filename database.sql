CREATE TABLE formulasi (
     id INTEGER NOT NULL AUTO_INCREMENT , 
     rentang_berat VARCHAR (20) NOT NULL , 
     nama_pakan VARCHAR (50) NOT NULL , 
     berat_pakan INTEGER NOT NULL , 
     jangka_waktu VARCHAR (25) NOT NULL , 
     karyawan_id_karyawan INTEGER NOT NULL,

     PRIMARY KEY (id)
);

CREATE TABLE hewan_ternak (
     id_ternak INTEGER NOT NULL AUTO_INCREMENT , 
     jenis VARCHAR (50) NOT NULL , 
     tanggal_pendataan DATETIME NOT NULL , 
     status VARCHAR (50) NOT NULL , 
     karyawan_id_karyawan INTEGER NOT NULL ,

     PRIMARY KEY (id_ternak)
);

CREATE TABLE karyawan (
     id_karyawan INTEGER NOT NULL AUTO_INCREMENT , 
     nama VARCHAR (100) NOT NULL , 
     email VARCHAR (100) NOT NULL , 
     password VARCHAR (50) NOT NULL , 
     alamat VARCHAR (100) NOT NULL , 
     no_hp VARCHAR (20) NOT NULL , 
     foto_profile VARCHAR (100) NOT NULL , 
     pemilik_id_pemilik INTEGER NOT NULL ,
     status INTEGER NOT NULL,

     PRIMARY KEY (id_karyawan),
     UNIQUE(no_hp)
);

CREATE TABLE pemilik (
     id_pemilik INTEGER NOT NULL AUTO_INCREMENT, 
     nama VARCHAR (100) NOT NULL , 
     email VARCHAR (100) NOT NULL , 
     password VARCHAR (50) NOT NULL , 
     nama_peternakan VARCHAR (100) NOT NULL , 
     alamat_peternakan VARCHAR (100) NOT NULL , 
     foto_profil VARCHAR (100) NOT NULL ,

     PRIMARY KEY(id_pemilik),
     UNIQUE (email)
);

CREATE TABLE penjadwalan (
     id_jadwal INTEGER NOT NULL AUTO_INCREMENT , 
     jenis VARCHAR (30) NOT NULL , 
     jam TIME NOT NULL , 
     tanggal DATETIME NOT NULL , 
     karyawan_id_karyawan INTEGER NOT NULL ,

     PRIMARY KEY(id_jadwal)
);

CREATE TABLE recording_penjualan (
     id_penjualan INTEGER NOT NULL AUTO_INCREMENT, 
     nama_produk VARCHAR (50) NOT NULL , 
     tanggal_penjualan DATETIME NOT NULL , 
     jumlah_produk INTEGER NOT NULL , 
     total INTEGER NOT NULL , 
     karyawan_id_karyawan INTEGER NOT NULL ,

     PRIMARY KEY(id_penjualan)
);

CREATE TABLE recording_produksi (
     id_produksi INTEGER NOT NULL AUTO_INCREMENT, 
     nama_produk VARCHAR (30) NOT NULL , 
     tanggal_produksi DATETIME NOT NULL , 
     jumlah_produksi INTEGER NOT NULL , 
     karyawan_id_karyawan INTEGER NOT NULL ,

     PRIMARY KEY(id_produksi)
);

ALTER TABLE formulasi 
    ADD CONSTRAINT formulasi_karyawan_FK
    FOREIGN KEY (karyawan_id_karyawan) REFERENCES karyawan(id_karyawan);

ALTER TABLE hewan_ternak 
    ADD CONSTRAINT hewan_ternak_karyawan_FK
    FOREIGN KEY (karyawan_id_karyawan) REFERENCES karyawan(id_karyawan);

ALTER TABLE karyawan 
    ADD CONSTRAINT karyawan_pemilik_FK
    FOREIGN KEY (pemilik_id_pemilik) REFERENCES pemilik(id_pemilik);

ALTER TABLE penjadwalan 
    ADD CONSTRAINT penjadwalan_karyawan_FK
    FOREIGN KEY (karyawan_id_karyawan) REFERENCES karyawan(id_karyawan);

ALTER TABLE recording_penjualan 
    ADD CONSTRAINT recording_penjualan_karyawan_FK
    FOREIGN KEY (karyawan_id_karyawan) REFERENCES karyawan(id_karyawan);

ALTER TABLE recording_produksi 
    ADD CONSTRAINT recording_produksi_karyawan_FK
    FOREIGN KEY (karyawan_id_karyawan) REFERENCES karyawan(id_karyawan);
