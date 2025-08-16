<?php
// Load the file (replace with API response if needed)
$json = file_get_contents("https://raw.githubusercontent.com/Jitendraunatti/fancode/refs/heads/main/data/fancode.json");
$data = json_decode($json, true);

$items = [
    [
        "url"  => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4pss-VvZrMXYjvpxs9wvf3hjEOMDoKkVc7w&s",
        "link" => "https://channelmyanmar.to/the-electric-state-2025/"
    ],
    [
        "url"  => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwRjpYr8pEHjcfHMI6421ZwIFdchjFzRdZtg&s",
        "link" => "https://channelmyanmar.to/tee-yod-2-2024-death-whisperer-2/"
    ],
    [
        "url"  => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-Mz1m90WSu5qPcfpX2nN1Zb20LQoDuCUVYN0KFLdXmyA1Vv14tpdhrBqyM2WwEGR5c6E&usqp=CAU",
        "link" => "https://channelmyanmar.to/mai-2024/"
    ]
];

$matches = [];

if (!empty($data['matches'])) {
    foreach ($data['matches'] as $match) {
        $matchData = [
            "match_id"   => $match["match_id"],
            "title"      => $match["title"],
            "tournament"=> $match["tournament"],
            "status"    => $match["status"],
            "startTime" => $match["startTime"],
            "category"  => $match["category"],
            "image"     => $match["image"],
            "stream"    => $match["STREAMING_CDN"]["Primary_Playback_URL"] ?? null,
            "teams"     => []
        ];

        // Add teams with score
        foreach ($match["teams"] as $team) {
            $teamData = [
                "name"       => $team["name"],
                "shortName"  => $team["shortName"],
                "flag"       => $team["flag"]["src"] ?? null,
                "score"      => null
            ];

            if (!empty($team["cricketScore"])) {
                $score = $team["cricketScore"][0];
                $teamData["score"] = $score["runs"] . "/" . $score["wickets"] . " (" . $score["overs"] . " ov)";
            } elseif (!empty($team["footballScore"])) {
                $teamData["score"] = $team["footballScore"]["points"];
            } elseif (!empty($team["basketBallScore"])) {
                $teamData["score"] = $team["basketBallScore"]["points"];
            } elseif (!empty($team["kabaddiScore"])) {
                $teamData["score"] = $team["kabaddiScore"]["points"];
            }

            $matchData["teams"][] = $teamData;
        }

        $matches[] = $matchData;
    }
}

$result = [
    "matches" => $matches,
    "items"   => $items
];

// Output JSON
header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
