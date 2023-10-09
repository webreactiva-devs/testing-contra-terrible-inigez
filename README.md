# Testing contra el Terrible Íñigez



> 🎯 Propósito: Aprender a atrapar errores antes de pasarlos a producción 🆕

Te cuento los requisitos y los trozos de código y plantilla que ya tienes disponibles para que sea aún más fácil.

## ⏳ Te contaré una historia

> “Espero que esté todo bien, te estaré vigilando”

Esto es lo último que dijo Terrible Íñigez cuando entró en el despacho. Después de eso todos sabíamos que estaría buscando cualquier forma de que aquella pantalla de aplicación diera un ERROS y salir a buscar al CULPABLE.

Su nombre era Terrible, no era un mote.

Sus padres, al verlo en la cuna, pensaron que sería mejor avisar a la humanidad de quién era ese ser solo con ver su nombre.

Terrible es tu jefe y tú te encargas de mantener con vida un sistema que captura unos datos de un podcast (el favorito de Terrible) y devuelve **cuatro datos fundamentales**:

1. El número del siguiente episodio
2. La duración total de todos los episodios
3. El número del episodio más corto
4. El título de episodios aleatorios cuya suma de duración no dure más de 2 horas

👉 El origen de los datos es este:  `https://tormenta-codigo-app-terrible.vercel.app/api/podcast`

👉 En la carpeta `/plantillas` tienes el código resuelto en varios lenguajes de programación.

Es sabido que Terrible se pasa el día buscando como hacer que otros fallen y cambia a propósito los datos de origen.

El sistema en producción ejecuta cada 15 minutos un proceso que captura la información y se la envía por email a Terrible.

Tu no puedes controlar ese proceso, no tienes acceso. 

Tampoco puedes controlar la fuente.

Así que solo te queda tu código.

**⚡️ Tu misión es crear cualquier tipo de test que evite que Terrible reciba un error.**

## 📋 Requisitos del reto

{YA CASI ESTA!}
