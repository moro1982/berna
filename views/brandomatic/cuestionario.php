<main class="bg-black">
        <!-- ENCABEZADO -->
        <div class="bg-black py-4">
            <h1 class="container text-center text-light"> Brand 'O Matic </h1>
            <p class="container text-center px-5 py-3 text-light"> Completa la siguiente encuesta para obtener un diagnóstico sobre tu marca de forma inmediata. </p>
        </div>

        <!-- FORMULARIO -->
        <div class="bg-black">
            <form class="container formulario bg-black" action="/diagnostico" method="post">
                <legend class="mb-5"> 
                    Responda las siguientes preguntas para obtener un diagnóstico al instante
                </legend>
                <!-- PREGUNTAS -->
                <ol class="list-group list-group-numbered">
                    <!-- PREGUNTA 1 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿La identidad de marca está presente y aplicada en todos los productos y espacios de la empresa?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si01" class="form-label mb-1"> Sí </label>
                            <input id="si01" type="radio" name="preg01" value="1" required>
                            <label for="no01" class="form-label mb-1"> No </label>
                            <input id="no01" type="radio" name="preg01" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 2 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿Qué porcentaje de la audiencia general reconoce la marca sin ayuda?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="valor02" class="form-label mb-1"> Porcentaje </label>
                            <input id="valor02" type="range" value="0" min="0" max="1" step=".25" oninput="this.nextElementSibling.value = this.value * 100" name="preg02" required>
                            <output> 0 </output>
                        </div>
                    </li>
                    <!-- PREGUNTA 3 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿Actualmente hay campañas activas financiadas para aumentar el reconocimiento de marca?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si03" class="form-label mb-1"> Sí </label>
                            <input id="si03" type="radio" name="preg03" value="1" required>
                            <label for="no03" class="form-label mb-1"> No </label>
                            <input id="no03" type="radio" name="preg03" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 4 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿Cómo es percibida la calidad de los productos o servicios de la marca?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="mala04" class="form-label mb-1"> Mala </label>
                            <input id="mala04" type="radio" name="preg04" value="0" required>
                            <label for="regular04" class="form-label mb-1"> Regular </label>
                            <input id="regular04" type="radio" name="preg04" value=".25" required>
                            <label for="buena04" class="form-label mb-1"> Buena </label>
                            <input id="buena04" type="radio" name="preg04" value=".5" required>
                            <label for="muyBuena04" class="form-label mb-1"> Muy Buena </label>
                            <input id="muyBuena04" type="radio" name="preg04" value="1" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 5 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿La marca ofrece algún producto o servicio de categoría Premium?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si05" class="form-label mb-1"> Sí </label>
                            <input id="si05" type="radio" name="preg05" value="1" required>
                            <label for="no05" class="form-label mb-1"> No </label>
                            <input id="no05" type="radio" name="preg05" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 6 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿Existe una Propuesta de Valor Única (PVU) que diferencie claramente a la marca de su competencia?
                        </div>
                        <div></div>
                        <div>
                            <div class="d-flex gap-3 align-items-center">
                                <label for="si06" class="form-label mb-1"> Sí </label>
                                <input id="si06" type="radio" name="preg06" value="1" required>
                                <label for="no06" class="form-label mb-1"> No </label>
                                <input id="no06" type="radio" name="preg06" value="0" required>
                            </div>
                            <p class="text-light mb-1">
                                **(No puede basarse únicamente en precio, calidad o servicio)**
                            </p>
                        </div>
                    </li>
                    <!-- PREGUNTA 7 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿El público siente un vínculo emocional con la marca y la recomienda de forma espontánea (boca en boca)?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si07" class="form-label mb-1"> Sí </label>
                            <input id="si07" type="radio" name="preg07" value="1" required>
                            <label for="no07" class="form-label mb-1"> No </label>
                            <input id="no07" type="radio" name="preg07" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 8 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿El mensaje de marca es claro y coherente en todos los canales de comunicación?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si08" class="form-label mb-1"> Sí </label>
                            <input id="si08" type="radio" name="preg08" value="1" required>
                            <label for="no08" class="form-label mb-1"> No </label>
                            <input id="no08" type="radio" name="preg08" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 9 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿Los consumidores consideran que el precio es justo en relación con los beneficios que perciben?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si09" class="form-label mb-1"> Sí </label>
                            <input id="si09" type="radio" name="preg09" value="1" required>
                            <label for="no09" class="form-label mb-1"> No </label>
                            <input id="no09" type="radio" name="preg09" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 10 -->
                    <li class="pregunta list-group-item bg-black text-light">
                        <div>
                            ¿La comunicación de marca posiciona al cliente como protagonista y a la marca como la guía que lo ayuda a lograr sus objetivos?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si10" class="form-label mb-1"> Sí </label>
                            <input id="si10" type="radio" name="preg10" value="1" required>
                            <label for="parcial10" class="form-label mb-1"> Parcialmente </label>
                            <input id="parcial10" type="radio" name="preg10" value=".5" required>
                            <label for="no10" class="form-label mb-1"> No </label>
                            <input id="no10" type="radio" name="preg10" value="0" required>
                        </div>
                    </li>
                </ol>
                <input type="submit" value="Enviar Respuestas" class="boton-verde mt-5 mb-3">
            </form>
        </div>
</main>