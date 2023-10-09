const API_URL = "https://tormenta-codigo-app-terrible.vercel.app/api/podcast";

async function fetchEpisodes() {
  try {
    const response = await fetch(API_URL);
    const responseData = await response.json();
    return responseData.data;
  } catch (error) {
    console.error("Error fetching the episodes:", error);
    return [];
  }
}

function processEpisodes(episodes) {
  if (!episodes || episodes.length === 0) return;

  // Convertir duration a números y ordenar episodios por number
  episodes.forEach((ep) => (ep.duration = parseInt(ep.duration, 10)));
  episodes.sort((a, b) => parseInt(a.number, 10) - parseInt(b.number, 10));

  // Calcular el siguiente episode number
  const nextEpisodeNumber =
    parseInt(episodes[episodes.length - 1].number, 10) + 1;

  // Calcular la suma total de duration
  const totalDuration = episodes.reduce((sum, ep) => sum + ep.duration, 0);

  // Encontrar el episode más corto
  const shortestEpisode = episodes.reduce(
    (shortest, ep) => (ep.duration < shortest.duration ? ep : shortest),
    episodes[0]
  );

  // Crear una lista aleatoria y seleccionar titles de episodios que sumen menos de 2 horas
  const shuffledEpisodes = episodes.sort(() => Math.random() - 0.5);
  const twoHourLimit = 2 * 60 * 60; // 2 horas en segundos
  let durationSum = 0;
  const selectedTitles = [];
  for (const ep of shuffledEpisodes) {
    if (durationSum + ep.duration <= twoHourLimit) {
      durationSum += ep.duration;
      selectedTitles.push(ep.title);
    }
  }

  // Imprimir resultados
  console.log("Next episode number:", nextEpisodeNumber);
  console.log("Total duration of all episodes:", totalDuration);
  console.log("Number of the shortest episode:", shortestEpisode.number);
  console.log("Titles below 2 hours:", selectedTitles);
}

async function main() {
  const episodes = await fetchEpisodes();
  processEpisodes(episodes);
}

main();
