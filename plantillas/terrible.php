<?php

$apiUrl = "https://tormenta-codigo-app-terrible.vercel.app/api/podcast";

function fetchEpisodes($apiUrl)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $apiUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($ch);
  curl_close($ch);

  if (!$result) {
    echo "Error fetching the episodes: ", PHP_EOL;
    return [];
  }

  $data = json_decode($result, true);
  return $data['data'];
}

function processEpisodes($episodes)
{
  if (!$episodes) {
    return;
  }

  // Convert duration to integers and sort episodes by number
  foreach ($episodes as &$ep) {
    $ep['duration'] = (int)$ep['duration'];
  }
  unset($ep);

  usort($episodes, function ($a, $b) {
    return (int)$a['number'] - (int)$b['number'];
  });

  // Calculate the next episode number
  $nextEpisodeNumber = (int)$episodes[count($episodes) - 1]['number'] + 1;

  // Calculate the total duration
  $totalDuration = array_sum(array_column($episodes, 'duration'));

  // Find the shortest episode
  $shortestEpisode = min(array_column($episodes, 'duration'));

  // Shuffle episodes and select titles that sum to less than 2 hours
  shuffle($episodes);
  $twoHourLimit = 2 * 60 * 60;
  $durationSum = 0;
  $selectedTitles = [];
  foreach ($episodes as $ep) {
    if ($durationSum + $ep['duration'] <= $twoHourLimit) {
      $durationSum += $ep['duration'];
      $selectedTitles[] = $ep['title'];
    }
  }

  // Print results
  echo "Next episode number: ", $nextEpisodeNumber, PHP_EOL;
  echo "Total duration of all episodes: ", $totalDuration, PHP_EOL;
  echo "Duration of the shortest episode: ", $shortestEpisode, PHP_EOL;
  echo "Titles below 2 hours: ", implode(', ', $selectedTitles), PHP_EOL;
}

$episodes = fetchEpisodes($apiUrl);
processEpisodes($episodes);
