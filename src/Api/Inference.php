<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;
use YourReselling\Upload;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Inference
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * POST /products/inference/anthropic/v1/messages
     * POST /products/inference/anthropic/v1/messages
     * Permissions: inference:chat
     * Response: stream; json() preserves the full envelope and pagination.
     *
     * @param  array{max_tokens: int, messages: list<array{role: string}>, metadata?: list<mixed>|null, model: string, stop_sequences?: list<mixed>|null, stream?: bool, system?: mixed, temperature?: float|null, thinking?: mixed, tool_choice?: mixed, tools?: list<mixed>|null, top_p?: float|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function messages(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/anthropic/v1/messages', [], $query, $body, false, true);
    }

    /**
     * GET /products/inference/anthropic/v1/models
     * GET /products/inference/anthropic/v1/models
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function models(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/anthropic/v1/models', [], $query, null, false, true);
    }

    /**
     * Create Speech
     * POST /products/inference/audio/speech
     * Permissions: inference:tts
     * Response: binary; json() preserves the full envelope and pagination.
     * Convert text to speech audio using an AI voice model. Returns a WAV audio stream. Pricing is based on the number of input characters.
     *
     * @param  array{model: string, input: string, voice: string, language?: string|null, response_format?: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function createSpeech(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/audio/speech', [], $query, $body, false, true);
    }

    /**
     * Create Transcription
     * POST /products/inference/audio/transcriptions
     * Permissions: inference:stt
     * Response: json-or-text; json() preserves the full envelope and pagination.
     * Transcribes an audio file to text (OpenAI-compatible `audio/transcriptions`, multipart/form-data). Billed per minute using the reported audio duration. Supported formats, synchronous or asynchronous processing, and upload limits depend on the model; some models limit uploads to 25 MB.
     *
     * @param  array{file: Upload, model: string, language?: string|null, response_format?: 'json'|'text'|'verbose_json'}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/audio/transcriptions', [], $query, $body, true, true);
    }

    /**
     * List Available Voices
     * GET /products/inference/audio/voices
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a list of all available TTS voices from the provider.
     *
     * @param  array{model?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function voices(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/audio/voices', [], $query, null, false, true);
    }

    /**
     * Create Chat Completion
     * POST /products/inference/chat/completions
     * Permissions: inference:chat
     * Response: stream; json() preserves the full envelope and pagination.
     * Create a chat completion using an AI model. Supports SSE streaming via the stream parameter. Use model group slugs for automatic routing to the best available model.
     *
     * @param  array{model: string, messages: list<array{content?: mixed, name?: string|null, role: 'system'|'user'|'assistant'|'tool'|'developer', tool_call_id?: string, tool_calls?: list<array{function?: array{arguments?: string, name?: string}, id?: string, type?: 'function'}>}>, tools?: list<array{function?: array{description?: string, name?: string, parameters?: list<mixed>}, type?: 'function'}>, tool_choice?: string, parallel_tool_calls?: bool, stream?: bool, max_tokens?: int, temperature?: float, top_p?: float, enable_thinking?: bool, thinking_budget?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function completions(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/chat/completions', [], $query, $body, false, true);
    }

    /**
     * Create RAG Chat Completion
     * POST /products/inference/chat/completions/rag
     * Permissions: inference:chat
     * Response: json; json() preserves the full envelope and pagination.
     * Create a chat completion with Retrieval-Augmented Generation using a vector collection. The model receives relevant context from the collection automatically.
     *
     * @param  array{collection: string, model: string, messages: list<array{content: string, role: 'system'|'user'|'assistant'|'tool'|'developer'}>, max_tokens?: int, temperature?: float}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rag(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/chat/completions/rag', [], $query, $body, false, true);
    }

    /**
     * Generate Image
     * POST /products/inference/images/generations
     * Permissions: inference:images
     * Response: json; json() preserves the full envelope and pagination.
     * Generate one or more images from a text prompt using an AI image model. Pricing follows the model catalog: per image, megapixel, or reported tokens and selected quality/resolution.
     *
     * @param  array{model: string, prompt: string, size?: string, resolution?: string, quality?: string, aspect_ratio?: string, output_format?: string, n?: int, image?: list<string>|null, negative_prompt?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function postImagesGenerations(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/images/generations', [], $query, $body, false, true);
    }

    /**
     * List All Models
     * GET /products/inference/models
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available AI models and model groups across all types (chat, tts, image) in OpenAI-compatible format. Use the returned `id` as the `model` parameter in completion requests.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/models', [], $query, null, false, true);
    }

    /**
     * List Audio (TTS) Models
     * GET /products/inference/models/audio
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available text-to-speech AI models in OpenAI-compatible format.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function audio(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/models/audio', [], $query, null, false, true);
    }

    /**
     * List Chat Models
     * GET /products/inference/models/chat
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available chat AI models and model groups in OpenAI-compatible format.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function chat(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/models/chat', [], $query, null, false, true);
    }

    /**
     * List Image Models
     * GET /products/inference/models/images
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available image generation AI models in OpenAI-compatible format.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function images(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/models/images', [], $query, null, false, true);
    }

    /**
     * List Speech-to-Text Models
     * GET /products/inference/models/stt
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available speech-to-text (transcription) AI models in OpenAI-compatible format. Billed per minute of audio.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function speechToText(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/models/stt', [], $query, null, false, true);
    }

    /**
     * List Video Models
     * GET /products/inference/models/video
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available video generation AI models (e.g. Sora) in OpenAI-compatible format. Video models are billed per second of generated video.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function video(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/models/video', [], $query, null, false, true);
    }

    /**
     * Create Moderation
     * POST /products/inference/moderations
     * Permissions: inference:moderations
     * Response: json; json() preserves the full envelope and pagination.
     * Analyzes text for hate, self-harm, sexual, and violence content. Pricing is based on the number of input characters.
     *
     * @param  array{model: string, input: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function postModerations(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/moderations', [], $query, $body, false, true);
    }

    /**
     * Get Current Month Usage
     * GET /products/inference/usage
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns live aggregated inference usage statistics for the current calendar month. Counters are updated in real time on every request.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function getUsage(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/usage', [], $query, null, false, true);
    }

    /**
     * Get Daily Usage Breakdown
     * GET /products/inference/usage/daily
     * Permissions: inference:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a per-day, per-model breakdown of inference usage for a given date range. Defaults to the current month.
     *
     * @param  array{from?: string, to?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function daily(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/usage/daily', [], $query, null, false, true);
    }

    /**
     * List Vector Collections
     * GET /products/inference/vector-store
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all vector collections belonging to the authenticated reseller.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function getVectorStore(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/vector-store', [], $query, null, false, true);
    }

    /**
     * Create Vector Collection
     * POST /products/inference/vector-store
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new vector collection at the provider and registers it locally. Collections are used as knowledge bases for RAG chat completions.
     *
     * @param  array{name: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function postVectorStore(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/vector-store', [], $query, $body, false, true);
    }

    /**
     * Delete Vector Collection
     * DELETE /products/inference/vector-store/{collection}
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a vector collection from the provider and the local database. All items and files in the collection will be permanently removed.
     *
     * @param  string  $collection  Collection ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $collection, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/inference/vector-store/{collection}', ['collection' => $collection], $query, $body, false, true);
    }

    /**
     * Show Vector Collection
     * GET /products/inference/vector-store/{collection}
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Returns details of a specific vector collection.
     *
     * @param  string  $collection  Collection ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $collection, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/vector-store/{collection}', ['collection' => $collection], $query, null, false, true);
    }

    /**
     * Update Vector Collection
     * PATCH /products/inference/vector-store/{collection}
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Updates the name of a vector collection at the provider and locally.
     *
     * @param  string  $collection  Collection ID
     * @param  array{name: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function update(string $collection, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/inference/vector-store/{collection}', ['collection' => $collection], $query, $body, false, true);
    }

    /**
     * List Collection Files
     * GET /products/inference/vector-store/{collection}/files
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all files uploaded to a vector collection.
     *
     * @param  string  $collection  Collection ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function getVectorStoreCollectionFiles(string $collection, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/vector-store/{collection}/files', ['collection' => $collection], $query, null, false, true);
    }

    /**
     * Upload File to Collection
     * POST /products/inference/vector-store/{collection}/files
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Uploads a file (up to 10 MB) to a vector collection. The file content will be parsed, embedded, and indexed for semantic search.
     *
     * @param  string  $collection  Collection ID
     * @param  array{file: Upload}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function postVectorStoreCollectionFiles(string $collection, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/vector-store/{collection}/files', ['collection' => $collection], $query, $body, true, true);
    }

    /**
     * Delete Collection File
     * DELETE /products/inference/vector-store/{collection}/files/{file}
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Permanently deletes a file from a vector collection and removes its indexed content.
     *
     * @param  string  $collection  Collection ID
     * @param  string  $file  File ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function deleteVectorStoreCollectionFilesFile(string $collection, string $file, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/inference/vector-store/{collection}/files/{file}', ['collection' => $collection, 'file' => $file], $query, $body, false, true);
    }

    /**
     * Show Collection File
     * GET /products/inference/vector-store/{collection}/files/{file}
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Returns details of a specific file in a vector collection.
     *
     * @param  string  $collection  Collection ID
     * @param  string  $file  File ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function getVectorStoreCollectionFilesFile(string $collection, string $file, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/vector-store/{collection}/files/{file}', ['collection' => $collection, 'file' => $file], $query, null, false, true);
    }

    /**
     * List Collection Items
     * GET /products/inference/vector-store/{collection}/items
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all text items stored in a vector collection.
     *
     * @param  string  $collection  Collection ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function getVectorStoreCollectionItems(string $collection, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/vector-store/{collection}/items', ['collection' => $collection], $query, null, false, true);
    }

    /**
     * Add Item to Collection
     * POST /products/inference/vector-store/{collection}/items
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Adds a new text item to a vector collection. The content will be embedded and stored for semantic search.
     *
     * @param  string  $collection  Collection ID
     * @param  array{content: string, description?: string, auto_chunk?: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function postVectorStoreCollectionItems(string $collection, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/vector-store/{collection}/items', ['collection' => $collection], $query, $body, false, true);
    }

    /**
     * Delete Collection Item
     * DELETE /products/inference/vector-store/{collection}/items/{item}
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Permanently deletes an item from a vector collection.
     *
     * @param  string  $collection  Collection ID
     * @param  string  $item  Item ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function deleteVectorStoreCollectionItemsItem(string $collection, string $item, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/inference/vector-store/{collection}/items/{item}', ['collection' => $collection, 'item' => $item], $query, $body, false, true);
    }

    /**
     * Show Collection Item
     * GET /products/inference/vector-store/{collection}/items/{item}
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Returns details of a specific item in a vector collection.
     *
     * @param  string  $collection  Collection ID
     * @param  string  $item  Item ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function getVectorStoreCollectionItemsItem(string $collection, string $item, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/vector-store/{collection}/items/{item}', ['collection' => $collection, 'item' => $item], $query, null, false, true);
    }

    /**
     * Update Collection Item
     * PATCH /products/inference/vector-store/{collection}/items/{item}
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Updates the description of an item in a vector collection.
     *
     * @param  string  $collection  Collection ID
     * @param  string  $item  Item ID
     * @param  array{description?: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function patchVectorStoreCollectionItemsItem(string $collection, string $item, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/inference/vector-store/{collection}/items/{item}', ['collection' => $collection, 'item' => $item], $query, $body, false, true);
    }

    /**
     * Search Vector Collection
     * POST /products/inference/vector-store/{collection}/search
     * Permissions: inference:vectorstore
     * Response: json; json() preserves the full envelope and pagination.
     * Performs a semantic similarity search across all items in a vector collection.
     *
     * @param  string  $collection  Collection ID
     * @param  array{input: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function search(string $collection, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/vector-store/{collection}/search', ['collection' => $collection], $query, $body, false, true);
    }

    /**
     * List Videos
     * GET /products/inference/videos
     * Permissions: inference:videos
     * Response: json; json() preserves the full envelope and pagination.
     * Returns your most recent video jobs, newest first.
     *
     * @param  array{limit?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function getVideos(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/videos', [], $query, null, false, true);
    }

    /**
     * Create Video
     * POST /products/inference/videos
     * Permissions: inference:videos
     * Response: json; json() preserves the full envelope and pagination.
     * Starts an asynchronous video render and returns a video job object immediately. Poll `GET /videos/{video_id}` until `status` is `completed`, then download the MP4 from `GET /videos/{video_id}/content`. Billing uses the model catalog rates for the selected duration, resolution, audio and image inputs. The charge is booked once after completion.
     *
     * @param  array{generate_audio?: bool, model: string, prompt: string, seconds?: string, size?: string, image_url?: string|null, video_url?: string|null, reference_images?: list<string>|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function postVideos(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/inference/videos', [], $query, $body, false, true);
    }

    /**
     * Delete Video
     * DELETE /products/inference/videos/{videoId}
     * Permissions: inference:videos
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes the stored MP4 and cancels the render if it is still running. Usage already booked stays on your invoice.
     *
     * @param  string  $videoId  videoId route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function deleteVideosVideoId(string $videoId, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/inference/videos/{videoId}', ['videoId' => $videoId], $query, $body, false, true);
    }

    /**
     * Retrieve Video
     * GET /products/inference/videos/{videoId}
     * Permissions: inference:videos
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the current state of a video job. Each call refreshes the render status from the provider until the job reaches a terminal state.
     *
     * @param  string  $videoId  videoId route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function getVideosVideoId(string $videoId, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/videos/{videoId}', ['videoId' => $videoId], $query, null, false, true);
    }

    /**
     * Download Video Content
     * GET /products/inference/videos/{videoId}/content
     * Permissions: inference:videos
     * Response: binary; json() preserves the full envelope and pagination.
     * Streams the rendered MP4. Only available once the video job reached status `completed`.
     *
     * @param  string  $videoId  videoId route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function content(string $videoId, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/inference/videos/{videoId}/content', ['videoId' => $videoId], $query, null, false, true);
    }
}
