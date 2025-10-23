-- =========================================
-- Archivo: create_stored_procedures.sql
-- Sistema: Sistema de Informes Académicos
-- =========================================

-- 🔹 LIMPIEZA GENERAL
DROP PROCEDURE IF EXISTS sp_listar_estudiantes;
DROP PROCEDURE IF EXISTS sp_insertar_estudiante;
DROP PROCEDURE IF EXISTS sp_actualizar_estudiante;
DROP PROCEDURE IF EXISTS sp_eliminar_estudiante;

DROP PROCEDURE IF EXISTS sp_listar_informes;
DROP PROCEDURE IF EXISTS sp_insertar_informe;
DROP PROCEDURE IF EXISTS sp_actualizar_informe;
DROP PROCEDURE IF EXISTS sp_eliminar_informe;

DROP PROCEDURE IF EXISTS sp_generar_reporte_general;
DROP PROCEDURE IF EXISTS sp_listar_estadisticas;

DELIMITER //

-- ===========================================================
-- 🔸 MÓDULO ESTUDIANTES
-- ===========================================================
CREATE PROCEDURE sp_listar_estudiantes()
BEGIN
    SELECT id_estudiante, nombre, apellido, correo, carrera, ciclo
    FROM estudiantes
    ORDER BY nombre;
END //

CREATE PROCEDURE sp_insertar_estudiante(
    IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_correo VARCHAR(150),
    IN p_carrera VARCHAR(100),
    IN p_ciclo VARCHAR(20)
)
BEGIN
    INSERT INTO estudiantes (nombre, apellido, correo, carrera, ciclo)
    VALUES (p_nombre, p_apellido, p_correo, p_carrera, p_ciclo);
END //

CREATE PROCEDURE sp_actualizar_estudiante(
    IN p_id INT,
    IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_correo VARCHAR(150),
    IN p_carrera VARCHAR(100),
    IN p_ciclo VARCHAR(20)
)
BEGIN
    UPDATE estudiantes
    SET nombre = p_nombre,
        apellido = p_apellido,
        correo = p_correo,
        carrera = p_carrera,
        ciclo = p_ciclo
    WHERE id_estudiante = p_id;
END //

CREATE PROCEDURE sp_eliminar_estudiante(IN p_id INT)
BEGIN
    DELETE FROM estudiantes WHERE id_estudiante = p_id;
END //

-- ===========================================================
-- 🔸 MÓDULO INFORMES
-- ===========================================================
CREATE PROCEDURE sp_listar_informes()
BEGIN
    SELECT 
        i.id_informe,
        i.titulo,
        i.fecha,
        i.estado,
        d.nombre AS docente,
        c.nombre AS curso
    FROM informes i
    INNER JOIN docentes d ON i.id_docente = d.id_docente
    INNER JOIN cursos c ON i.id_curso = c.id_curso
    ORDER BY i.fecha DESC;
END //

CREATE PROCEDURE sp_insertar_informe(
    IN p_titulo VARCHAR(100),
    IN p_fecha DATE,
    IN p_estado VARCHAR(20),
    IN p_id_docente INT,
    IN p_id_curso INT
)
BEGIN
    INSERT INTO informes (titulo, fecha, estado, id_docente, id_curso)
    VALUES (p_titulo, p_fecha, p_estado, p_id_docente, p_id_curso);
END //

CREATE PROCEDURE sp_actualizar_informe(
    IN p_id INT,
    IN p_titulo VARCHAR(100),
    IN p_fecha DATE,
    IN p_estado VARCHAR(20)
)
BEGIN
    UPDATE informes
    SET titulo = p_titulo,
        fecha = p_fecha,
        estado = p_estado
    WHERE id_informe = p_id;
END //

CREATE PROCEDURE sp_eliminar_informe(IN p_id INT)
BEGIN
    DELETE FROM informes WHERE id_informe = p_id;
END //

-- ===========================================================
-- 🔸 MÓDULO REPORTES
-- ===========================================================
CREATE PROCEDURE sp_generar_reporte_general()
BEGIN
    SELECT 
        e.nombre AS estudiante,
        c.nombre AS curso,
        i.titulo AS informe,
        i.estado,
        i.fecha
    FROM informes i
    INNER JOIN estudiantes e ON i.id_estudiante = e.id_estudiante
    INNER JOIN cursos c ON i.id_curso = c.id_curso
    ORDER BY i.fecha DESC;
END //

-- ===========================================================
-- 🔸 MÓDULO ESTADÍSTICAS
-- ===========================================================
CREATE PROCEDURE sp_listar_estadisticas()
BEGIN
    SELECT 
        (SELECT COUNT(*) FROM estudiantes) AS total_estudiantes,
        (SELECT COUNT(*) FROM informes) AS total_informes,
        (SELECT COUNT(*) FROM informes WHERE estado = 'Aprobado') AS informes_aprobados,
        (SELECT COUNT(*) FROM informes WHERE estado = 'Pendiente') AS informes_pendientes;
END //

DELIMITER ;
