# Audio Providers

Complete reference for placeholder audio generation.

## Provider Comparison

| Provider | Type | File Size | Format | Best For |
|----------|------|-----------|--------|----------|
| `soundhelix` | Real music | ~5 MB/track | MP3 (direct URL) | Music players, podcast demos |
| `silence` | Silent | ~1-5 KB | WAV (data URL) | Audio player testing, UI testing |

## SoundHelix Provider (Default)

**Provider:** `soundhelix`  
**URL:** [https://www.soundhelix.com](https://www.soundhelix.com)

Royalty-free generated music tracks. Perfect for music players, podcast demos, and media applications!

### Features

- **10 unique tracks** - Different algorithmically generated music
- **Full-length songs** - ~5 minutes each
- **Royalty-free** - Free to use, no licensing issues
- **Electronic music** - Various styles and tempos
- **Direct MP3 URLs** - No API keys required
- **Reliable CDN** - Fast delivery

### Basic Usage

```twig
{# Default music (Song 1) #}
<audio src="{{ omnia_audio(10) }}" controls></audio>

{# Specific song #}
<audio src="{{ omnia_audio(10, {song: 5}) }}" controls></audio>

{# Different songs in loop #}
{% for i in 1..10 %}
    <audio src="{{ omnia_audio(10, {song: i}) }}" controls></audio>
{% endfor %}
```

### Supported Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `song` | int | 1 | Song number (1-10) |
| `provider` | string | `'soundhelix'` | Provider name |

### All Available Songs

```twig
{# Song 1 (Default) #}
{{ omnia_audio(10, {song: 1}) }}

{# Songs 2-10 #}
{{ omnia_audio(10, {song: 2}) }}
{{ omnia_audio(10, {song: 3}) }}
{{ omnia_audio(10, {song: 4}) }}
{{ omnia_audio(10, {song: 5}) }}
{{ omnia_audio(10, {song: 6}) }}
{{ omnia_audio(10, {song: 7}) }}
{{ omnia_audio(10, {song: 8}) }}
{{ omnia_audio(10, {song: 9}) }}
{{ omnia_audio(10, {song: 10}) }}
```

### Music Player Example

```twig
<div class="music-player">
    <h2>Playlist</h2>
    {% for song in 1..10 %}
        <div class="track">
            <h4>Track {{ song }}</h4>
            <audio src="{{ omnia_audio(10, {song: song}) }}" 
                   controls 
                   preload="metadata"></audio>
        </div>
    {% endfor %}
</div>
```

### Podcast Demo Example

```twig
<div class="podcast-episodes">
    {% for i in 1..5 %}
        {% set host = fake('name') %}
        {% set song = (i - 1) % 10 + 1 %}
        <div class="episode">
            <img src="{{ omnia_avatar(host, 80) }}" alt="{{ host }}">
            <h3>{{ lorem_title() }}</h3>
            <p>Hosted by {{ host }}</p>
            <audio src="{{ omnia_audio(10, {song: song}) }}" controls></audio>
        </div>
    {% endfor %}
</div>
```

## Silence Provider

**Provider:** `silence`

Generates silent WAV audio as base64-encoded data URLs. Perfect for testing audio players without actual sound.

### Features

- **Instant playback** - No network request (data URL)
- **Configurable duration** - 1-60 seconds
- **Custom sample rate** - 22050, 44100, 48000 Hz
- **Mono or stereo** - 1 or 2 channels
- **Small file size** - ~1-5 KB

### Basic Usage

```twig
{# Basic silent audio (10 seconds) #}
<audio src="{{ omnia_audio(10, {provider: 'silence'}) }}" controls></audio>

{# Custom duration #}
<audio src="{{ omnia_audio(30, {provider: 'silence'}) }}" controls></audio>

{# Short beep placeholder #}
<audio src="{{ omnia_audio(1, {provider: 'silence'}) }}" controls></audio>
```

### Supported Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `sample_rate` | int | 44100 | Sample rate in Hz (22050, 44100, 48000) |
| `channels` | int | 2 | Number of channels (1 = mono, 2 = stereo) |
| `provider` | string | `'soundhelix'` | Use `'silence'` for silent audio |

### Advanced Examples

```twig
{# Low quality (smaller file) #}
<audio src="{{ omnia_audio(10, {
    provider: 'silence',
    sample_rate: 22050,
    channels: 1
}) }}" controls></audio>

{# CD quality stereo #}
<audio src="{{ omnia_audio(30, {
    provider: 'silence',
    sample_rate: 44100,
    channels: 2
}) }}" controls></audio>

{# Professional quality #}
<audio src="{{ omnia_audio(60, {
    provider: 'silence',
    sample_rate: 48000,
    channels: 2
}) }}" controls></audio>
```

### Audio Player Testing Example

```twig
<div class="audio-player-test">
    {# Very short #}
    <audio src="{{ omnia_audio(1, {provider: 'silence'}) }}" controls></audio>
    
    {# Medium #}
    <audio src="{{ omnia_audio(30, {provider: 'silence'}) }}" controls></audio>
    
    {# Long #}
    <audio src="{{ omnia_audio(60, {provider: 'silence'}) }}" controls></audio>
</div>
```

## Choosing the Right Provider

### Use `soundhelix` (default) when:
- ✅ Building music players
- ✅ Creating podcast demos
- ✅ Testing media applications
- ✅ Client demonstrations
- ✅ Want real audio content
- ✅ Need different tracks for variety

### Use `silence` when:
- ✅ Testing audio player UI
- ✅ Testing audio controls
- ✅ Testing audio events
- ✅ Don't need actual sound
- ✅ Need instant loading (data URLs)
- ✅ Want smallest possible file size

## Technical Details

### SoundHelix

- **Format:** MP3
- **Delivery:** Direct URL (CDN)
- **File Size:** ~5 MB per track
- **Duration:** ~5 minutes per track
- **Sample Rate:** 44.1 kHz
- **Bitrate:** ~128 kbps
- **Channels:** Stereo (2)

### Silence

- **Format:** WAV (PCM)
- **Delivery:** Base64 data URL
- **File Size:** ~1-5 KB (depends on duration)
- **Duration:** Configurable (1-60 seconds)
- **Sample Rates:** 22050, 44100, 48000 Hz
- **Channels:** Mono (1) or Stereo (2)
- **Bit Depth:** 16-bit

## Complete Example

```twig
<!DOCTYPE html>
<html>
<head>
    <title>Music Player Demo</title>
</head>
<body>
    <div class="player">
        <h1>Now Playing</h1>
        
        {# Main player with SoundHelix music #}
        <audio id="main-player" 
               src="{{ omnia_audio(10, {song: 1}) }}" 
               controls 
               autoplay></audio>
        
        <h2>Playlist</h2>
        <ul>
            {% for song in 1..10 %}
                <li>
                    <a href="#" onclick="document.getElementById('main-player').src='{{ omnia_audio(10, {song: song}) }}'; return false;">
                        Track {{ song }}
                    </a>
                </li>
            {% endfor %}
        </ul>
    </div>
    
    {# Silent audio for testing #}
    <div class="test-controls">
        <h2>Test Audio Controls</h2>
        <audio src="{{ omnia_audio(5, {provider: 'silence'}) }}" controls></audio>
    </div>
</body>
</html>
```

## Configuration

### Set Default Provider

```yaml
# config/packages/omnia_ipsum.yaml
omnia_ipsum:
    audios:
        default_provider: 'soundhelix'  # Use music by default
        default_duration: 10
```

### Use in Templates

```twig
{# Uses default provider (soundhelix) #}
<audio src="{{ omnia_audio(10) }}" controls></audio>

{# Explicit soundhelix #}
<audio src="{{ omnia_audio(10, {provider: 'soundhelix', song: 3}) }}" controls></audio>

{# Explicit silence #}
<audio src="{{ omnia_audio(10, {provider: 'silence'}) }}" controls></audio>
```

## Performance

### SoundHelix
- ✅ CDN-delivered MP3 files
- ✅ ~5 MB per track
- ✅ Streams well (progressive download)
- ⚠️ Full-length songs (consider using `preload="metadata"`)

### Silence
- ✅ Instant loading (data URL)
- ✅ Very small (~1-5 KB)
- ✅ No network request
- ✅ Perfect for UI testing

### Recommendations

```twig
{# For music demos: Use SoundHelix with metadata preload #}
<audio src="{{ omnia_audio(10, {song: 1}) }}" 
       controls 
       preload="metadata"></audio>

{# For UI testing: Use silence #}
<audio src="{{ omnia_audio(10, {provider: 'silence'}) }}" 
       controls></audio>
```

## See Also

- [Quick Reference](quickstart.md) - Quick examples
- [Configuration](configuration.md) - Configure audio settings
- [SoundHelix](https://www.soundhelix.com/) - Official SoundHelix website
