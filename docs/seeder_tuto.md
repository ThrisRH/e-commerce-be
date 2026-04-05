You are a senior Laravel developer working on an existing Porto architecture project.

IMPORTANT:
- First, carefully read and understand the current project structure.
- Detect:
  - Model locations (e.g. App\Containers\...\Models\...)
  - Namespace conventions
  - Existing relationships in Category and Attribute models
  - Pivot table name (likely attribute_category or category_attribute)
- Do NOT assume structure blindly. Adapt to the existing codebase.

---

### CURRENT CONTEXT

I already have:

1. Category model with hierarchical structure (parent_id)
2. Attribute model already seeded
3. Categories seeded with slugs like:
   - laptop-officeworks
   - laptop-gaming
   - pc-parts
   - cpu
   - gpu
   - ram
   - hdd
   - ssd
   - mainboard
   - psu
   - case
   - monitor

4. Attributes seeded with slugs like:
   - color
   - warranty
   - weight
   - operating-system
   - cpu-series
   - cpu-cores
   - cpu-threads
   - base-clock
   - boost-clock
   - cpu-socket
   - cpu-cache
   - tdp
   - gpu-chipset
   - vram-capacity
   - vram-type
   - gpu-interface
   - ram-capacity
   - ram-speed
   - ram-type
   - ram-slots
   - storage-capacity
   - storage-type
   - form-factor
   - read-speed
   - write-speed
   - motherboard-chipset
   - form-factor-mobo
   - screen-size
   - resolution
   - refresh-rate
   - response-time
   - panel-type
   - wattage
   - efficiency-rating

---

### TASK

Create a seeder: CategoryAttributeSeeder

---

### REQUIREMENTS

1. Fetch categories by slug dynamically (no hardcoded IDs)

2. Fetch attributes by slug dynamically

3. Attach attributes to categories using pivot relationship

4. Mapping:

#### Laptop Officeworks
- color
- warranty
- weight
- operating-system
- cpu-series
- ram-capacity
- storage-capacity
- screen-size
- resolution

#### Laptop Gaming
- all Laptop Officeworks attributes PLUS:
- gpu-chipset
- vram-capacity
- refresh-rate

#### CPU
- cpu-series
- cpu-cores
- cpu-threads
- base-clock
- boost-clock
- cpu-socket
- cpu-cache
- tdp

#### GPU
- gpu-chipset
- vram-capacity
- vram-type
- gpu-interface

#### RAM
- ram-capacity
- ram-speed
- ram-type
- ram-slots

#### HDD & SSD
- storage-capacity
- storage-type
- form-factor
- read-speed
- write-speed

#### Mainboard
- motherboard-chipset
- cpu-socket
- ram-slots
- form-factor-mobo

#### PSU
- wattage
- efficiency-rating

#### Monitor
- screen-size
- resolution
- refresh-rate
- response-time
- panel-type

---

### IMPLEMENTATION DETAILS

- Use syncWithoutDetaching()
- Create helper method:
  attachAttributes(Category $category, array $attributeSlugs)

- Handle missing category or attribute gracefully (skip if not found)

- Follow Porto structure:
  namespace Database\Seeders;

---

### OUTPUT

- Full working PHP seeder class
- Clean, readable, maintainable code
- No pseudo code
