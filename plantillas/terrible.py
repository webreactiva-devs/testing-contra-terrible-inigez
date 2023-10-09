import requests
import random

API_URL = "https://tormenta-codigo-app-terrible.vercel.app/api/podcast"

def fetch_episodes():
    try:
        response = requests.get(API_URL)
        response.raise_for_status()  # will raise an error for 4xx and 5xx responses
        return response.json()["data"]
    except requests.RequestException as e:
        print(f"Error fetching the episodes: {e}")
        return []

def process_episodes(episodes):
    if not episodes:
        return

    # Convert duration to integers and sort episodes by number
    for ep in episodes:
        ep['duration'] = int(ep['duration'])
    episodes.sort(key=lambda x: int(x['number']))

    # Calculate the next episode number
    next_episode_number = int(episodes[-1]['number']) + 1

    # Calculate the total duration
    total_duration = sum(ep['duration'] for ep in episodes)

    # Find the shortest episode
    shortest_episode = min(episodes, key=lambda x: x['duration'])

    # Shuffle episodes and select titles that sum to less than 2 hours
    random.shuffle(episodes)
    two_hour_limit = 2 * 60 * 60
    duration_sum = 0
    selected_titles = []
    for ep in episodes:
        if duration_sum + ep['duration'] <= two_hour_limit:
            duration_sum += ep['duration']
            selected_titles.append(ep['title'])

    # Print results
    print(f"Next episode number: {next_episode_number}")
    print(f"Total duration of all episodes: {total_duration}")
    print(f"Number of the shortest episode: {shortest_episode['number']}")
    print(f"Titles below 2 hours: {selected_titles}")

def main():
    episodes = fetch_episodes()
    process_episodes(episodes)

if __name__ == "__main__":
    main()
