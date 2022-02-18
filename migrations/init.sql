CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE role_routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    route_path VARCHAR(100) NOT NULL,
    CONSTRAINT fk_role_routes_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE user_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    CONSTRAINT fk_user_roles_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_user_roles_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE faktor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cf INT NOT NULL,
    sf INT NOT NULL
);

CREATE TABLE gap (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nilai INT NOT NULL,
    selisih INT NOT NULL,
    keterangan TEXT
);

CREATE TABLE kriteria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
);

CREATE TABLE subkriteria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_kriteria INT NOT NULL,
    nama VARCHAR(100) NOT NULL,
    bobot INT NOT NULL,
    CONSTRAINT fk_subkriteria_id_kriteria FOREIGN KEY (id_kriteria) REFERENCES kriteria(id) ON DELETE CASCADE
);

CREATE TABLE jurusan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
);

CREATE TABLE faktor_jurusan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_kriteria INT NOT NULL,
    id_jurusan INT NOT NULL,
    sebagai VARCHAR(100) NOT NULL,
    CONSTRAINT fk_faktor_jurusan_id_kriteria FOREIGN KEY (id_kriteria) REFERENCES kriteria(id) ON DELETE CASCADE,
    CONSTRAINT fk_faktor_jurusan_id_jurusan FOREIGN KEY (id_jurusan) REFERENCES jurusan(id) ON DELETE CASCADE
);

CREATE TABLE calon_siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NULL
);

CREATE TABLE penilaian (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_calon_siswa INT NOT NULL,
    id_kriteria INT NOT NULL,
    id_subkriteria INT NOT NULL,
    CONSTRAINT fk_penilaian_id_kriteria FOREIGN KEY (id_kriteria) REFERENCES kriteria(id) ON DELETE CASCADE,
    CONSTRAINT fk_penilaian_id_subkriteria FOREIGN KEY (id_subkriteria) REFERENCES subkriteria(id) ON DELETE CASCADE
);

INSERT INTO faktor (cf, sf) VALUES (60,40);

INSERT INTO kriteria(nama) VALUES ('Menghidupkan komputer dan mematikan komputer');
INSERT INTO kriteria(nama) VALUES ('Menggunakan mouse');
INSERT INTO kriteria(nama) VALUES ('Mengetik');
INSERT INTO kriteria(nama) VALUES ('Menginstall Komputer');
INSERT INTO kriteria(nama) VALUES ('Menginstall Software');

INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (1,'Bisa',3);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (1,'Cukup',2);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (1,'Tidak Bisa',1);

INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (2,'Bisa',3);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (2,'Cukup',2);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (2,'Tidak Bisa',1);

INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (3,'Bisa',3);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (3,'Cukup',2);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (3,'Tidak Bisa',1);

INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (4,'Bisa',3);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (4,'Cukup',2);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (4,'Tidak Bisa',1);

INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (5,'Bisa',3);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (5,'Cukup',2);
INSERT INTO subkriteria(id_kriteria,nama,bobot) VALUES (5,'Tidak Bisa',1);

INSERT INTO jurusan(nama) VALUES ('Microsoft Office');
INSERT INTO jurusan(nama) VALUES ('Jaringan Komputer');
INSERT INTO jurusan(nama) VALUES ('Desain Grafis');

INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (1,1,'cf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (2,1,'cf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (3,1,'cf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (4,1,'sf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (5,1,'sf');

INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (1,2,'cf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (2,2,'sf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (3,2,'sf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (4,2,'cf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (5,2,'cf');

INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (1,3,'sf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (2,3,'cf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (3,3,'cf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (4,3,'sf');
INSERT INTO faktor_jurusan(id_kriteria,id_jurusan,sebagai) VALUES (5,3,'sf');