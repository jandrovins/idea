<?php

// Authors: Simon Florez Silva (sflorezs1@gmail.com), Vincent Arcila (vaarcilal@eafit.edu.co), Adrian Gutierrez (aagutierrl@eafit.edu.co)

return [
    //Home
    'home.welcome' => 'Bienvenido!',
    'home.store' => 'Ir a tienda',
    'home.owned' => 'Tus cursos',

    // Auth user specific
    'auth.login' => 'Ingresar',
    'auth.register' => 'Registro',
    'auth.logout' => 'Cerrar Sesión',
    'auth.password' => 'Contraseña',
    'auth.confirm_password' => 'Confirmar contraseña',
    'auth.reset_password' => 'Reiniciar contraseña',
    'auth.forgot_password' => 'Olvidaste tu contraseña?',
    'auth.email_address' => 'Dirección E-Mail',
    'auth.send_password_reset_link' => 'Enviar Link de Reinicio de Contraseña',
    'auth.confirm_your_password_before_continuing' => 'Confirma tu contraseña antes de continuar.',
    'auth.remember_me' => 'Recuérdame',
    'auth.verify_email' => 'Verifica tu e-mail',
    'auth.name' => 'Nombre',
    'auth.verification_link_sent' => 'Un nuevo enlace de verificación fue enviado a to email.',
    'auth.check_verification_link' => 'Antes de proceder, por favor revisa to email for un enlace de verificación.',
    'auth.if_email_not_received' => 'Si no recibiste el enlace.',
    'auth.click_to_request_another' => 'presiona aquí para recibir uno nuevo.',

    // Error 404 page Specific
    'error.404.title' => 'NO HAY NADA',

    // Course Create Specific
    'course.create.cardTitle' => 'Crear Curso',
    'course.create.categories' => 'Categorías (separadas por coma)',
    'course.create.categoriesPlaceholder' => 'Anatomía, Matemáticas, Programación...',
    'course.create.submit' => 'Crear',
    'course.create.success' => 'Curso creado exitosamente!',

    // Course Reviews Specific
    'course.createReview.cardTitle' => 'Crear Reseña',
    'course.createReview.submit' => 'Crear',
    'course.createReview.success' => 'Reseña Creada!',
    'course.createReview.commentPlaceholder' => 'Muy buen curso!',
    'course.review.comment' => 'Comentar',
    'course.review.rating' => 'Puntaje',
    'course.review.user' => 'Usuario',
    'course.reviews' => 'Reseñas',
    'course.hasReviews' => 'Reseñas para este curso',
    'course.hasNoReviews' => 'Aún no hay reseñas para este curso.',

    // Course Delete Specific
    'course.delete.success' => 'Curso borrado exitosamente!',
    'course.delete.asksure' => '¿Está seguro que desea eliminar este curso? Esto eliminará todas sus lecciones también.',

    // Course Edit Specific
    'course.edit.cardTitle' => 'Editar curso',
    'course.edit.success' => 'Curso actualizado correctamente!',
    'course.edit.submit' => 'Actualizar',

    // Course List Specific
    'course.list.noCoursesToList' => 'No hay cursos para listar',
    'course.list.all' => 'Lista de todos los cursos.',
    'course.list.own' => 'Mis Cursos',
    'course.list.available' => 'Nuestros Cursos',
    'course.list.admin.cardTitle' => 'Administra tus Cursos',
    'course.list.admin.lesson' => 'Administra tus Lecciones',

    // Course List Top Specific
    'course.listTop' => 'Top cursos',
    'course.listTop.cardTitle' => 'Nuestros cursos mejor puntuados.',
    'course.listTop.noCoursesWithReviews' => 'No hay cursos con reseña.',
    'course.listTop.onlyOneCourseWithReviews' => 'Solo hay un curso con reseña.',
    'course.listTop.notEnoughCoursesWithReviews' => ' Solo hay :count_courses con reseña.',

    // Course Enroll Specific
    'course.enroll.failed' => 'El Curso :id no existe!',
    'course.enroll.success' => 'Inscrito exitosamente en el curso.',
    'course.enroll.leave.success' => 'Has abandonado el curso exitosamente.',
    'course.enroll.noCourseId' => 'No se brindó Id.',
    'course.enroll.submit' => 'Inscribirse',
    'course.enroll.leave' => 'Abandonar',
    'course.enroll.leave.asksure' => '¿Está seguro que desea abandonar el curso? Esto eliminará todo su progreso. No se reembolsarán sus créditos.',

    // Course Show Specific
    'course.lessons' => 'Lecciones para este curso.',
    'course.noLessons' => 'Aún no hay lecciones para este curso.',

    // Course General
    'course.id' => 'ID del Curso',
    'course.title' => 'Título del curso',
    'course.author' => 'Autor',
    'course.titlePlaceholder' => 'Magia Computacional',
    'course.manage' => 'Administrar Cursos',
    'course.learningStyle' => 'Estilo de Aprendizaje',
    'course.auditory' => 'Auditivo',
    'course.kinesthesic' => 'Kinestésico',
    'course.visual' => 'Visual',
    'course.categories' => 'Categorías',
    'course.price' => 'Precio',
    'course.priceUnit' => '&#36;USD',
    'course.summary' => 'Resumen',
    'course.image' => 'Imagen del Curso',
    'course.welcome' => 'Mis cursos',
    'course.store' => 'Tienda',
    'course.enroll' => 'Incribirse',
    'course.summaryPlaceholder' => 'Si se puede imaginar, se puede programar.',

    // Lesson Create Specific
    'lesson.create.cardTitle' => 'Crear lección',
    'lesson.create.success' => 'Lección creada exitosamente!',

    // Course Delete Specific
    'lesson.delete.success' => 'Lección eliminada exitosamente!',

    // Lesson List Specific
    'lesson.list.cardTitle' => 'Nuestras Lecciones',
    'lesson.show' => 'More',

    // Lesson Edit Specific
    'lesson.edit.cardTitle' => 'Edit lección',
    'lesson.edit.success' => 'Lesson updated successfully!',

    // Lesson General
    'lesson.id' => 'ID de Lección',
    'lesson.title' => 'Título de Lección',
    'lesson.body' => 'Cuerpo de Lección',
    'lesson.list.title' => 'Nuestras Lecciones',
    'lesson.manage.title' => 'Administrar Lecciones',
    'lesson.edit.title' => 'Editar Lección',
    'lesson.create.title' => 'Crear una Lección',
    'lesson.titlePlaceholder' => 'Clonación de Dinosaurios',

    // Image general
    'admin.image.create.error' => 'Error tratando de guardar la imagen, por favor intente de nuevo.',

    // Admin Specific
    'admin.nav' => 'Administración de admin',
    'admin.index.title' => 'Consola de admin',

    // General usage
    'close' => 'Cerrar',
    'delete' => 'Eliminar',
    'actions' => 'Acciones',
    'nav' => 'Navegación',
    'home' => 'Inicio',
    'student_opt' => 'Opciones de Estudiante',
    'hello' => 'Hola',
    'guest' => 'invitado',
    'languages' => 'Idiomas',

    // User
    'user.dob' => 'Fecha de Nacimiento',
    'user.phoneNum' => 'Número Celular',

    //API
    'api.ad' =>'Anuncio proporcionado por idéa Ads',
    'api.visit' =>'Visítalos',
    'api.associates' =>'Nuestros Socios - FraganceStore.',

    //Footer
    'footer.about-us' =>'Acerca de Nosotros',
    'footer.about' =>'Acerca',
    'footer.about-company' =>'Acerca de la Compañía',
    'footer.about-text' =>'Idéa es una aplicación con el propósito de ampliar la cobertura de educación,
        mediante ideas interactivas y dinámicas, en la cual se permita aplicar mejoras al sistema educativo
        por medio de la ejecución de modelos internacionales que faciliten el aprendizaje, desde un punto de
        vista tanto técnico como socio-emocional.',
    'footer.home' =>'Inicio',
    'footer.blog' =>'Blog',
    'footer.contact' =>'Contáctanos',
    'footer.copyright' =>'&copy;2021 Idéa.',
    'footer.address' =>'#49-03. Canalave City. Sinnoh Region.',
    'footer.phone' =>'555-4930924',
    'footer.email' =>'admin@edu.co',
    'fragance.error' => 'Un error ocurrió al tratar de contactar fragance-store, está su servidor caído? Por favor vuelve a intentar más tarde.',
];
