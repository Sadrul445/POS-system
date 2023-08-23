@push('css')
@endpush
<style>
    .counting-number {
        font-size: 24px;
        color: #333;
    }
</style>

<div class="container mt-4">
    <div class="row">
        <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
            <a href="javascript:void(0)">
                <div class="card income-card card-secondary shadow-sm">
                    <div class="card-body text-center">
                        <div class="round-box"></div>
                        <h5 class="counting-number">0</h5>
                        <p>Our Annual Income</p>
                        <a class="btn-arrow arrow-primary" href="javascript:void(0)">
                            <i class="toprightarrow-primary fa fa-arrow-up me-2"></i>95.54%
                        </a>
                        <div class="parrten"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
            <a href="javascript:void(0)">
                <div class="card income-card card-secondary shadow-sm">
                    <div class="card-body text-center">
                        <div class="round-box"></div>
                        <h5 class="counting-number">0</h5>
                        <p>Our Annual losses</p>
                        <a class="btn-arrow arrow-secondary" href="javascript:void(0)">
                            <i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>90.54%
                        </a>
                        <div class="parrten"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
            <a href="http://">
                <div class="card income-card card-secondary shadow-sm">
                    <div class="card-body text-center">
                        <div class="round-box"></div>
                        <h5 class="counting-number">0</h5>
                        <p>Employees</p>
                        <a class="btn-arrow arrow-success" href="javascript:void(0)">
                            <i class="toprightarrow-success fa fa-arrow-up me-2"></i>90.54%
                        </a>
                        <div class="parrten"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
            <a href="http://">
                <div class="card income-card card-secondary shadow-sm">
                    <div class="card-body text-center">
                        <div class="round-box"></div>
                        <h5 class="counting-number">0</h5>
                        <p>Products</p>
                        <a class="btn-arrow arrow-success" href="javascript:void(0)">
                            <i class="toprightarrow-success fa fa-arrow-up me-2"></i>90.54%
                        </a>
                        <div class="parrten"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-sm-12 box-col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Company Overview</h5>
                </div>
                <div class="card-body">
                    <div class="ct-8 flot-chart-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function animateCountingWithCommas(targetNumbers, duration) {
        const countingElements = document.querySelectorAll('.counting-number');
        const frameDuration = 1000 / 60; // 60 frames per second
        const totalFrames = Math.ceil(duration / frameDuration);

        const startNumbers = Array.from(countingElements).map(element => parseInt(element.innerText.replace(/,/g, '')));
        const increments = startNumbers.map((startNumber, index) => (targetNumbers[index] - startNumber) / totalFrames);

        let currentNumbers = [...startNumbers];
        let frame = 0;

        function updateNumbers() {
            for (let i = 0; i < countingElements.length; i++) {
                currentNumbers[i] += increments[i];
                countingElements[i].innerText = formatNumberWithCommas(Math.round(currentNumbers[i]));
            }

            frame++;
            if (frame < totalFrames) {
                requestAnimationFrame(updateNumbers);
            }
        }

        updateNumbers();
    }

    // Usage
    animateCountingWithCommas([85049, 20359, 85, 500000], 2000); // Example values with commas
</script>
@endpush