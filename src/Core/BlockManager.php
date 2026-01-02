<?php

namespace WPPB\Core;

class BlockManager
{
    /**
     * Initializes the block management.
     * Hooks into 'init' to register blocks.
     */
    public static function init(): void
    {
        add_action('init', [self::class, 'registerBlocks']);
    }

    /**
     * Registers all blocks found in the build directory.
     */
    public static function registerBlocks(): void
    {
        $blocksPath = WPPB_PLUGIN_DIR . 'build';

        if (!is_dir($blocksPath)) {
            return;
        }

        $items = array_diff(scandir($blocksPath), ['..', '.']);

        foreach ($items as $item) {
            $itemPath = $blocksPath . '/' . $item;
            if (is_dir($itemPath)) {
                $blockJsonPath = $itemPath . '/block.json';
                if (file_exists($blockJsonPath)) {
                    register_block_type_from_metadata($blockJsonPath);
                }
            }
        }
    }
}
