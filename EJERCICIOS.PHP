--1. Mostrar los usuarios inactivos

	select * from usuario where user_activo = 1;

--2. Mostrar la cantidad usuarios.

	select count(*) as Cantidad from usuario;

--3. Mostrar todas las columnas de la tabla usuario y la tabla grupo usuario

	select usuario.*, usuario_grupo.* from usuario join usuario_grupo on usuario.id_grupo_usu = usuario_grupo.id; 
	
--4. Mostrar la tabla grupo usuario y otra columna que me diga cantidad de usuario por cada grupo. (Opcional)
    
    SELECT UG.nombre, COUNT(usuario.id) AS Cantidad_Usu
    FROM usuario_grupo UG
    INNER JOIN usuario ON UG.id = usuario.id_grupo_usu
    GROUP BY UG.id;