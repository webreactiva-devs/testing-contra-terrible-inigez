import khttp.get
import kotlinx.serialization.Serializable
import kotlinx.serialization.decodeFromString
import kotlinx.serialization.json.Json

const val API_URL = "https://tormenta-codigo-app-terrible.vercel.app/api/podcast"

@Serializable
data class Episode(
    val number: String,
    var duration: String,
    val title: String
)

fun fetchEpisodes(): List<Episode>? {
    return try {
        val response = get(API_URL)
        Json.decodeFromString<List<Episode>>(response.text)
    } catch (e: Exception) {
        println("Error fetching the episodes: $e")
        null
    }
}

fun processEpisodes(episodes: List<Episode>?) {
    episodes?.let {
        if (it.isNotEmpty()) {
            it.forEach { ep -> ep.duration = ep.duration.toInt().toString() }
            it.sortBy { ep -> ep.number.toInt() }
            
            val nextEpisodeNumber = it.last().number.toInt() + 1
            val totalDuration = it.sumBy { ep -> ep.duration.toInt() }
            val shortestEpisode = it.minByOrNull { ep -> ep.duration.toInt() }
            val selectedTitles = it.shuffled().takeWhile { ep -> ep.duration.toInt() < 2 * 60 * 60 }

            println("Next episode number: $nextEpisodeNumber")
            println("Total duration of all episodes: $totalDuration")
            println("Number of the shortest episode: ${shortestEpisode?.number}")
            println("Titles below 2 hours: ${selectedTitles.map { ep -> ep.title }}")
        }
    }
}

fun main() {
    val episodes = fetchEpisodes()
    processEpisodes(episodes)
}
